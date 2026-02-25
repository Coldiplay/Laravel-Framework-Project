<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


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

    public function fetch(int $id)
    {
        $post = Post::find($id);
        if (!$post) {
            abort(404);
        }

        return view('posts.show_single_post', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $attributes = $request->all();

        if (!$this->checkCategoryExists($attributes['category_id'])) {
            return redirect()->back()->with('error', 'Category not found');
        }

        $post->update($attributes);
        $request->user()->posts()->save($post);

        return redirect()->route('posts.all');
    }
    public function updateShowForm(Post $post)
    {
        //$post = Post::find($id);

        $categories = Category::all();
        return view('posts.update_form', compact(['post', 'categories']));
    }

    public function create(Request $request)
    {
        $post = new Post();

        $attributes = $request->all();

        if (!$this->checkCategoryExists($attributes['category_id'])) {
            return redirect()->back()->with('error', 'Category not found');
        }

        $post->fill($attributes);
        $post->slug = $attributes['title'];
        $post->user_id = $request->user()->id;

        $post->save();

        return redirect()->route('posts.all');
    }
    public function createShowForm()
    {
        //dd(Auth::user());
        $categories = Category::all();
        return view('posts.create_form', compact('categories'));
    }

    public function kill(int $post_id)
    {
        Post::destroy($post_id);

        return redirect()->route('posts.index');
    }



    private function checkCategoryExists(int $category_id)
    {
        return Category::where('id', $category_id)->exists();
    }
}
