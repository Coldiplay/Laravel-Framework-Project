<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function fetch_all(Request $request)
    {
        $user = $request->user();

        $posts = Post::query()->with('category');

        if ($user->role !== 'admin') {
            $posts = $posts->where('user_id', $user->id);
        }

        $posts = $posts->orderByDesc('created_at')->paginate(10);

        return view('posts.index', compact('posts'));
    }

    public function fetch(int $id): Factory|View
    {
        $post = Post::find($id);
        if (!$post) {
            abort(404);
        }
        dd([$post, Auth::user(), $post->user_id == $post->user_id]);
        //Gate::allows('post-kill', [Auth::user(), $post]);

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

        return redirect()->route('posts.all');
    }



    private function checkCategoryExists(int $category_id)
    {
        return Category::where('id', $category_id)->exists();
    }
}
