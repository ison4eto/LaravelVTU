<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'title' => 'required|max:200',
            'authors' => 'required',
            'category' => 'required',
            'file' => 'required|mimes:doc,ppt,txt,pdf|max:2048'
        ]);

        $fileName = $request->file->getClientOriginalName();
        $request->file->storeAs('uploaded', $fileName);
        $request->user()->posts()->create([
            'title' => $request->title,
            'authors' => $request->authors,
            'category' => $request->category,
            'file' => $fileName
        ]);

         if($request->has('stayOnPage')) {
            return back();
         }
        return redirect()->route('dashboard');
    }

    public function download(Request $request)
    {
        $filename = $request->input('filename');

        return Storage::download($filename);
    }
}
