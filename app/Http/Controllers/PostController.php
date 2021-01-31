<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
            'file' => 'required|max:2048'
        ]);

        $fileName = $request->file->getClientOriginalName();
        $request->file->storeAs('', $fileName);
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

    public function getPost($id)
    {
        $post = Post::find($id);
        return view('posts.view', [
            'post' => $post
        ]);
    }

    public function editForm($id)
    {
        $post = Post::find($id);
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    public function edit($id, Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:200',
            'authors' => 'required',
            'category' => 'required'
        ]);

        $post = Post::find($id);

        if($request->file) {
            $fileName = $request->file->getClientOriginalName();
            $request->file->storeAs('', $fileName);

            $oldFileName = $post->file;
            Storage::delete($oldFileName);
            $post->file = $fileName;
        }

        $post->title = $request->title;

        $post->authors = $request->authors;

        $post->category = $request->category;

        // updates updated at
        $post->touch();

        $post->save();

        return redirect()->route('posts.view', ['id' => $post->id]);
    }

    public function deleteForm($id)
    {
        $post = Post::find($id);
        return view('posts.delete', [
            'post' => $post
        ]);
    }

    public function delete($id)
    {
        $post = Post::find($id);

        if($post->file) {
            Storage::delete($post->file);
        }

        $post->delete();

        return redirect()->route('dashboard');
    }
}
