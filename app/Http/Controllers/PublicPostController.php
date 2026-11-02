<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PublicPostController extends Controller
{
    public function show(string $id)
    {
        $post = Post::with([
            'category',
            'user',
            'comments' => function ($query) {
                $query->where('status', 'approved')
                      ->with('user')
                      ->latest();
            },
        ])
        ->where('status', 'published')
        ->findOrFail($id);

        $post->increment('views');

        return view('posts.show', compact('post'));
    }
}
