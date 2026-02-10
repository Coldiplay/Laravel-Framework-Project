<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use MongoDB\BSON\Int64;

class CategoryController extends Controller
{
    //
    public function index()
    {
        //$categories = Category::withCount('')->get();
        $categories = Category::withCount('posts')->get();
        //dd($categories->toArray()[0]['title']);
        return view('categories.index', compact('categories'));
    }

    public function show_single_category($category_id)
    {
        $category = Category::find($category_id);

        //dd($category->title);
        $posts = $category->posts()->get();

        return view('categories.show_single_category', compact([
            'category',
            'posts'
        ]));
    }



}
