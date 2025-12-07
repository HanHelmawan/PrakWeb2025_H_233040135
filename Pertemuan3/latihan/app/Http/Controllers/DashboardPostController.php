<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    public function index()
    {
        // Menampilkan postingan milik user yang sedang login saja
        $posts = Post::where('user_id', auth()->user()->id);

        // Fitur search
        if (request('search')) {
            $posts->where('title', 'like', '%' . request('search') . '%');
        }

        return view('dashboard.index', [
            'posts' => $posts->paginate(5)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('dashboard.show', [
            'post' => $post
        ]);
    }

    public function create()
    {
        // Ambil semua categories
        $categories = Category::all();

        return view('dashboard.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // // Generate slug dari title
        // $slug = Str::slug($request->title);

        // // Pastikan slug unique - jika sudah ada, tambahkan angka di belakang
        // $originalSlug = $slug;
        // $count = 1;
        // while (Post::where('slug', $slug)->existed()) {
        //     $slug = $originalSlug . '-' . $count;
        //     $count++;
        // }

        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            // Store file di storage/app/public/post-images
            // Method store() akan generate nama file unik otomatis
            $imagePath = $request->file('image')->store('post-images', 'public');
        }
        

        // Create post
        Post::create([
            'title' => $request->title,
            'slug' => $slug,
            'category_id' => $request->category_id,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'image' => $imagePath, // Simpan path gambar (contoh: post-images/abc123.jpg)
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('dashboard.index')->with('success', 'Post created 
        successfully!');

        // Validasi input dengan custom messages
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id', // Memastikan ID ada di tabel categories
            'excerpt' => 'required',
            'body' => 'required',
            // Aturan untuk Image: Opsional (nullable), harus gambar, format tertentu, max 2MB
            'image' => 'nullable|image|mimes:jpg,png,jpg,gif|max:2048',
        ],
        [   // Custom message
            'title.required' => 'Field Title wajib diisi',
            'title.max' => 'Field Title tidak boleh lebih dari 255 karakter',
            'category_id.required' => 'Field Category wajib dipilih',
            'category_id.exists' => 'Category yang dipilih tidak valid',
            'excerpt.required' => 'Field Excerpt wajib diisi',
            'body.required' => 'Field Content wajib diisi',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif',
            'image.max' => 'Ukuran gambar maksimal 2MB',
        ]); 

        // Jika validasi gagal, redirect kembali dengan error
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator) // Mengirimkan semua pesan error kembali
                ->withInput();          // Mengirimkan semua data yang sudah diinput (old data)
        }
    }
}