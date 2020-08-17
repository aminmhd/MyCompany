<?php

namespace App\Http\Controllers;

use App\Edit;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class GalleryController extends Controller
{
    public function index()
    {
        return view('panel.gallery.upload');
    }

    public function store(Request $request)
    {
        $auth_user_find = Auth::user();
        $images_text_info = $request->input('image_text');
        $images_info = $request->file('images');
        $this->validate($request,[
            'images' => 'required',
            'image_text' => 'required',
        ],[
            'images.required' => 'It is necessary to upload the Image',
            'image_text.required' => 'It is necessary to enter the Text'
        ]);
        foreach ($images_info as $item => $images) {
            $image_create = Image::create([
                'image_name' => $images->getClientOriginalName(),
                'image_text' => $images_text_info[$item],
                'image_type' => $images->getMimeType(),
                'image_user_id' => $auth_user_find->id,
            ]);
            $image_name = $images->getClientOriginalName();
            $public_path = public_path('images');
            $images->move($public_path, $image_name);
        }
        if ($image_create instanceof Image) {
            return redirect()->Route('upload.gallery.picture')->with(['success' => 'your images successfully uploaded']);
        } else {
            return redirect()->Route('upload.gallery.picture')->with(['error' => 'your images successfully not uploaded']);
        }


    }

    public function show()
    {
        $image_find = Image::all();
        return view('panel.gallery.show', compact('image_find'));
    }

    public function destroy($image_id)
    {
        if (ctype_digit($image_id)) {
            $image_find = Image::find($image_id);
            if ($image_find instanceof Image) {
                $image_find->delete();
                return redirect()->Route('show.gallery.image')->with(['success' => 'your image deleted successfully']);
            } else {
                return redirect()->Route('show.gallery.image')->with(['error' => 'your image not deleted successfully']);
            }
        }
    }

    public function edit($image_id)
    {
        $image_find = Image::find($image_id);
        $edit_find = $image_find->edits()
            ->get()
            ->pluck('edit_id')
            ->toArray();
        $image_edit = Edit::find(intval($edit_find));
        return view('panel.gallery.edit', compact('image_edit'));

    }

    public function update(Request $request, $image_id)
    {
        $auth_find = Auth::user();
        $image_table = Image::find($image_id);
        $edit_table = $image_table
            ->edits()
            ->get()
            ->pluck('edit_id')
            ->toArray();

        $edit_table = $image_table->edits()->first()->pluck('edit_id');


        $edit_request = [
            'edit_user_id' => $auth_find->id,
            'edit_image_id' => $image_id,
            'edit_image_address' => $request->get('edit_address'),
            'edit_image_phone' => $request->get('edit_phone'),
            'edit_image_explain' => $request->get('edit_explain'),
            'edit_image_text' => $request->get('edit_image_text'),
        ];
        /*///////validation*/
        $this->validation($request);
        /*////////////////////*/
        if ($request->has('edit_img')) {
            $image_table->update([
                'image_name' => $request->file('edit_img')->getClientOriginalName(),
                'image_type' => $request->file('edit_img')->getMimeType(),
                'image_text' => isset($edit_request['edit_image_text']) ? $edit_request['edit_image_text'] : $image_table->image_text,
            ]);
        }
        if ($edit_table && count($edit_table) == 1) {
            $edit_update = Edit::find(intval($edit_table));
            $edit_update->update($edit_request);
            return redirect()
                ->Route('show.gallery.image')
                ->with(['success' => 'your image successfully edited']);
        } else {
            $edit_create = Edit::create($edit_request);
            if ($edit_create instanceof Edit) {
                return redirect()
                    ->Route('show.gallery.image')
                    ->with(['success' => 'your image successfully edited']);
            }
        }


    }

    public function download($image_id)
    {
        $image_find = Image::find($image_id);
        $public_path = public_path('images');
        return response()->download($public_path . '/' . $image_find->image_name);
    }

    private function validation($value)
    {
        $this->validate($value, [
            'edit_image_text' => 'required',
            'edit_img' => 'required',
        ], [
            'edit_image_text.required' => 'It is necessary to enter the Text',
            'edit_img.required' => 'It is necessary to upload the Image',
        ]);
    }


}
