<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        foreach ($images_info as $item => $images) {
            $image_create = Image::create([
                'image_name' => $images->getClientOriginalName(),
                'image_text' => $images_text_info[$item],
                'image_type' => $images->getMimeType(),
                'image_user_id' => $auth_user_find->id,
            ]);
        }
        if ($image_create instanceof Image) {
            return redirect()->Route('upload.gallery.picture')->with(['success' => 'your images successfully uploaded']);
        } else {
            return redirect()->Route('upload.gallery.picture')->with(['error' => 'your images successfully not uploaded']);
        }


    }

    public function show()
    {
        return view('panel.gallery.show');
    }


}
