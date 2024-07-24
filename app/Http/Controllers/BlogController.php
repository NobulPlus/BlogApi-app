<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return Blog::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        return Blog::create($request->all());
    }

    public function show(Blog $blog)
    {
        return $blog->load('posts');
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
        ]);

        $blog->update($request->all());

        return $blog;
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();

        return response()->noContent();
    }
}
