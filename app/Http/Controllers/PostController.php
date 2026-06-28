<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // Panggil Model Post

class PostController extends Controller
{
    // Menampilkan daftar semua berita
    public function index()
    {
        // Ambil data berita terbaru, 6 per halaman
        $posts = Post::latest()->paginate(6);
        return view('berita.index', compact('posts')); 
    }

    // Menampilkan detail 1 berita berdasarkan slug
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('berita.show', compact('post'));
    }
}