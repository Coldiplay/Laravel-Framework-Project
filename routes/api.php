<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Swagger Documentation - редирект на Swagger UI
Route::get('/docs', function () {
    //exec('php artisan spectrum:generate --format=html');
    return redirect()->to('/spectrum/openapi.html');
});
//TODO: Перенести часть из котроллеров в API
//TODO: Почему-то документация создаётся оп шаблону api/api/*

// Public routes (без авторизации)
Route::post('/register', [AuthController::class, 'register'])->name('api.register');
Route::post('/login', [AuthController::class, 'login'])->name('api.login');
Route::get('/test', [PostController::class, 'fetchAll'])->name('api.posts.fetchAll');

// Protected routes (требуют авторизации)
Route::middleware('auth:sanctum')->group(function () {
    // Auth
    Route::post('/logout', [AuthController::class, 'logout'])->name('api.logout');
    Route::get('/user', [AuthController::class, 'user'])->name('api.user');

    // Posts
    Route::get('/posts', [PostController::class, 'fetchAll'])->name('api.posts.fetchAll');
    Route::get('/posts/{post}', [PostController::class, 'fetch'])->name('api.posts.fetch');
    Route::post('/posts', [PostController::class, 'create'])->name('api.posts.create');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('api.posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'kill'])->name('api.posts.kill');
});
