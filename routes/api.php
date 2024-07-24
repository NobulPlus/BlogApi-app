<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\InteractionController;
use App\Http\Controllers\AuthController;

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });

// Blog Endpoints
Route::apiResource('blogs', BlogController::class);

// Post Endpoints under a Specific Blog
Route::apiResource('blogs.posts', PostController::class);

// Interaction Endpoints
Route::post('posts/{post}/like', [InteractionController::class, 'like']);
Route::post('posts/{post}/comment', [InteractionController::class, 'comment']);

Route::get('/', function () {
    return 'API OKAY';
});

// Registration route
Route::post('register', [AuthController::class, 'register']);

// Login route
Route::post('login', [AuthController::class, 'login']);

// Logout route (protected by middleware)
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

