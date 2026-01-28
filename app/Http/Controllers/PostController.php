<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function show_single_post($slug)
    {
        $post = Post::where('slug', '=', $slug)->first();
        if (!$post) {
            abort(404);
        }

        return view('posts.show_single_post', compact('post'));
    }
}
