<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\PostController;
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

// Public routes (без авторизации)
Route::post('/register', [AuthController::class, 'register'])->name('api.register');
Route::post('/login', [AuthController::class, 'login'])->name('api.login');

// Protected routes (требуют авторизации)
Route::middleware('auth:sanctum')->group(function () {
    // Auth
    Route::post('/logout', [AuthController::class, 'logout'])->name('api.logout');
    Route::get('/user', [AuthController::class, 'user'])->name('api.user');

    // Posts
    Route::get('/posts', [PostController::class, 'index'])->name('api.posts.index');
    Route::post('/posts', [PostController::class, 'store'])->name('api.posts.store');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('api.posts.show');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('api.posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('api.posts.destroy');
});
