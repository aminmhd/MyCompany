<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function create()
    {
        return view('panel.blog.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'blog_subject' => 'required',
            'blog_img' => 'required',
        ], [
            'blog_subject.required' => 'subject is required',
            'blog_img.required' => 'upload image is required',
        ]);

        $blog_img_name = Str::random(5) . "/" . $request->file('blog_img')->getClientOriginalName();
        $auth_information = Auth::user();
        $blog_description_information = $request->get('blog_description');

        $create_blog_information = [
            'blog_subject' => $request->get('blog_subject'),
            'blog_user_name' => $auth_information->name,
            'blog_user_id' => $auth_information->id,
            'blog_description' => isset($blog_description_information) ? $blog_description_information : '!!!sorry this field is empty!!!',
            'blog_img' => $blog_img_name,
        ];
        $create_blog_table = Blog::create($create_blog_information);
        if ($create_blog_table) {
            return redirect()->Route('app.blog.create')->with(['success' => 'information of your blog created']);
        } else {
            return redirect()->Route('app.blog.create')->with(['error' => 'sorry information of your blog not created']);
        }

    }

    public function show()
    {
        $blog_created = Blog::all();
        return view('panel.blog.table', compact('blog_created'));
    }

    public function destroy($blog_id)
    {
        if (ctype_digit($blog_id)) {
            $blog_find = Blog::find($blog_id);
            if ($blog_find instanceof Blog) {
                $blog_find->delete();
                return redirect()->Route('app.blog.show')->with(['success' => 'The blog was successfully deleted']);
            }

        }
    }

    public function edit($blog_id)
    {
        $blog_find_edit = Blog::find($blog_id);
        if ($blog_find_edit instanceof Blog) {
            return view('panel.blog.create', compact('blog_find_edit'));
        } else {
            return view('panel.blog.table')->with(['error' => 'your blog not found']);
        }

    }

    public function update(Request $request, $blog_id)
    {
        $this->validate($request, [
            'blog_subject' => 'required',
            'blog_img' => 'required',
        ], [
            'blog_subject.required' => 'subject is required',
            'blog_img.required' => 'upload image is required',
        ]);
        $blog_img_name = Str::random(5) . "/" . $request->file('blog_img')->getClientOriginalName();
        $blog_update = Blog::find($blog_id);
        $blog_edit = [
            'blog_subject' => $request->get('blog_subject'),
            'blog_user_name' => $blog_update->blog_user_name,
            'blog_user_id' => $blog_update->blog_user_id,
            'blog_description' => $request->get('blog_description'),
            'blog_img' => $blog_img_name,
        ];
        if ($blog_update instanceof Blog) {
            $blog_update->update($blog_edit);
            return redirect()->Route('app.blog.show')->with(['success' => 'this blog was successfully updated']);
        }

    }

}
