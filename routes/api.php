<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\InteractionController;

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });

// Blog Endpoints
Route::apiResource('blogs', BlogController::class);

// Post Endpoints under a Specific Blog
Route::apiResource('blogs.posts', PostController::class);

Route::get('/', function () {
    return 'API OKAY';
});
