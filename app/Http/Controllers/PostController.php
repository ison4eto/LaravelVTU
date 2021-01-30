<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('posts.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'title' => 'required|max:200',
            'authors' => 'required',
            'category' => 'required'
        ]);

        $request->user()->posts()->create([
            'title' => $request->title,
            'authors' => $request->authors,
            'category' => $request->category,
            'file' => $request->file
        ]);

        return back();
    }
}
