<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categories',
    [CategoryController::class, 'index'])
    ->name('categories.index');

Route::get('/category/{id_category}', [CategoryController::class, 'show_single_category']);

Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index']);

Route::get('/post/{slug}', [\App\Http\Controllers\PostController::class, 'show_single_post']);
