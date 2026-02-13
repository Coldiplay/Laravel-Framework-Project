<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function fetch_all(Request $request)
    {
        $user = $request->user();

        if ($user->role !== 'admin') {
            $posts = Post::query()->where('user_id', $user->id);
        }
        else{
            $posts = Post::query();
        }

        $posts = $posts->paginate(10);

        return view('posts.index', compact('posts'));
    }

    public function fetchBySlug($slug)
    {
        $post = Post::where('slug', '=', $slug)->first();
        if (!$post) {
            abort(404);
        }

        return view('posts.show_single_post', compact('post'));
    }

    public function fetch(int $id)
    {
        $post = Post::find($id);
        if (!$post) {
            abort(404);
        }

        return view('posts.single_post', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $post->title = $request->title;
        //$post->slug = $request->slug;
        //$post->description = $request->description;
        $post->content = $request->post_content;
        //$post->category_id = $request->category_id;
        //$post->user_id = $request->user()->id;
        $request->user()->posts()->save($post);

        return redirect()->route('posts.index');
    }

    public function create(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        //$post->slug = $request->slug;
        //$post->description = $request->description;
        $post->content = $request->post_content;
        //$post->category_id = $request->category_id;
        $post->user_id = $request->user()->id;
        $post->save();
        //$request->user()->posts()->save($post);

        //Post::all()->add($post);
        return redirect()->route('posts.index');
    }

    public function kill(int $post_id)
    {
        Post::destroy($post_id);

        return redirect()->route('posts.index');
    }

    // TODO: Сделать показ форм добавления и редактирования
}
