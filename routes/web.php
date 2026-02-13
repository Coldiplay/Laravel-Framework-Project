<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
    //return view('welcome');
});

Route::prefix('categories')->group(function () {
    Route::get('/',
        [CategoryController::class, 'index'])
        ->name('categories.all');

    Route::get('/{id_category:int}',
        [CategoryController::class, 'show_single_category'])
        ->name('categories.single');
});

Route::prefix('posts')->group(function () {
    Route::get('/',
        [PostController::class, 'fetch_all'])
        ->name('posts.all');
    Route::get('/{slug:string}',
        [PostController::class, 'fetchBySlug'])
        ->name('posts.slug_single');
    Route::get('/{id:int}',
        [PostController::class, 'fetch'])
        ->name('posts.single');





    Route::put('/{id:int}',
        [PostController::class, 'update'])
        ->name('posts.update');

    Route::post('/',
        [PostController::class, 'create'])
        ->name('posts.create');

    Route::delete('/{id:int}',
        [PostController::class, 'kill'])
        ->name('posts.kill');
});


Auth::routes();

Route::prefix('admin')->group(function () {
    Route::get('/home',
        [HomeController::class, 'index'])
        ->name('home');
});

