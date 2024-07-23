<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index($blogId)
    {
        return response()->json(Post::where('blog_id', $blogId)->get());
    }

    public function store(Request $request, $blogId)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        $post = Post::create([
            'blog_id' => $blogId,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return response()->json($post, 201);
    }

    public function show($blogId, $postId)
    {
        $post = Post::with(['likes', 'comments'])->where('blog_id', $blogId)->find($postId);
        return response()->json($post);
    }

    public function update(Request $request, $blogId, $postId)
    {
        $post = Post::where('blog_id', $blogId)->find($postId);
        $post->update($request->all());
        return response()->json($post);
    }

    public function destroy($blogId, $postId)
    {
        Post::where('blog_id', $blogId)->where('id', $postId)->delete();
        return response()->json(null, 204);
    }

    public function like($postId)
    {
        $like = Like::create(['post_id' => $postId]);
        return response()->json($like, 201);
    }

    public function comment(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $comment = Comment::create([
            'post_id' => $postId,
            'content' => $request->content,
        ]);

        return response()->json($comment, 201);
    }
}
