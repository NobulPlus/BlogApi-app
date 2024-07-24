<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Blog $blog)
    {
        return $blog->posts;
    }

    public function store(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = new Post($request->all());
        $blog->posts()->save($post);

        return $post;
    }

    public function show(Blog $blog, Post $post)
    {
        return $post->load(['likes', 'comments']);
    }

    public function update(Request $request, Blog $blog, Post $post)
    {
        $request->validate([
            'title' => 'sometimes|string|max:255',
            'content' => 'sometimes|string',
        ]);

        $post->update($request->all());

        return $post;
    }

    public function destroy(Blog $blog, Post $post)
    {
        $post->delete();

        return response()->noContent();
    }
}
