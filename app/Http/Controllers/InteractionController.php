<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use App\Models\Comment;
use Illuminate\Http\Request;

class InteractionController extends Controller
{
    public function like(Post $post, Request $request)
    {
        $like = Like::create([
            'post_id' => $post->id,
            'user_id' => $request->user()->id,
        ]);

        return $like;
    }

    public function comment(Post $post, Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $comment = Comment::create([
            'post_id' => $post->id,
            'user_id' => $request->user()->id,
            'content' => $request->content,
        ]);

        return $comment;
    }
}
