<?php

namespace App\Http\Controllers;

use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(15);
        return view('dashboard', [
            'posts' => $posts
        ]);
    }
}
