<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        return view('panel.gallery.upload');
    }

    public function store(Request $request)
    {
        dd($request->file('images'));

    }
}
