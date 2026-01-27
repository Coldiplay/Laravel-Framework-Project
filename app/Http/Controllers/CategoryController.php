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
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function show_single_category($category_id)
    {
        $category = Category::all()->find($category_id);



        return view('categories.show_single_category', compact('category'));
    }



}
