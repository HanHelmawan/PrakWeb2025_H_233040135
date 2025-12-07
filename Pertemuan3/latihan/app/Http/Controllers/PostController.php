<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Mengambil post terbaru dipaling atas (latest)
        $posts = Post::with(['author', 'category'])->latest()->get();
        
        return view('posts', compact('posts'));
    }

    
    public function show(Post $post)
    {
        // Menggunakan load() untuk Lazy Eager Loading pada single instance
        $post->load(['author', 'category']);

        return view('post', compact('post')); 
        // Catatan: Pastikan kamu membuat view 'post.blade.php' untuk detail post
    }
}