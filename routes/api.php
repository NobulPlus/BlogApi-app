<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;

Route::middleware('auth.token')->group(function () {
    Route::get('blogs', [BlogController::class, 'index']);
    Route::post('blogs', [BlogController::class, 'store']);
    Route::get('blogs/{id}', [BlogController::class, 'show']);
    Route::put('blogs/{id}', [BlogController::class, 'update']);
    Route::delete('blogs/{id}', [BlogController::class, 'destroy']);
    
    Route::get('blogs/{blogId}/posts', [PostController::class, 'index']);
    Route::post('blogs/{blogId}/posts', [PostController::class, 'store']);
    Route::get('blogs/{blogId}/posts/{postId}', [PostController::class, 'show']);
    Route::put('blogs/{blogId}/posts/{postId}', [PostController::class, 'update']);
    Route::delete('blogs/{blogId}/posts/{postId}', [PostController::class, 'destroy']);

    Route::post('posts/{postId}/like', [PostController::class, 'like']);
    Route::post('posts/{postId}/comment', [PostController::class, 'comment']);
});
