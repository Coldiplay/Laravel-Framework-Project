<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
    //return view('welcome');
});

Route::get('/categories',
    [CategoryController::class, 'index'])
    ->name('categories.index');

Route::get('/category/{id_category}', [CategoryController::class, 'show_single_category']);

Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index']);

Route::get('/post/{slug}', [\App\Http\Controllers\PostController::class, 'show_single_post']);

Auth::routes();

Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
