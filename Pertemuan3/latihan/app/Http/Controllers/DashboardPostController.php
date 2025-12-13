<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

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
    $validatedData = $request->validate([
    'title' => 'required|max:255',
    'slug' => 'required|unique:posts',
    'category_id' => 'required',
    'body' => 'required',
    'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $validatedData['user_id'] = auth()->user()->id;
    // excerpt diambil 200 karakter dari body
    $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

    // Proses upload gambar jika ada
    if ($request->file('image')) {
        $validatedData['image'] = $request->file('image')->store('post-images', 'public');
    }

    Post::create($validatedData);

    return redirect('/dashboard/posts')->with('success', 'New post has been added!');
}

public function edit(Post $post)
        {
            // Mengecek apakah user berhak mengedit (Tugas Praktek 3: Policy)
            Gate::authorize('update', $post);

            return view('dashboard.edit', [
            'post' => $post,
            'categories' => Category::all()
            ]);
        }

        public function update(Request $request, Post $post)
    {
            // Mengecek policy sebelum update (Tugas Praktek 3)
            Gate::authorize('update', $post);

            // Validasi Rules
            $rules = [
                'title' => 'required|max:255',
                'category_id' => 'required',
                'body' => 'required'
            ];

            // Cek Slug: jika slug berubah, maka harus validasi unique.
            // Jika tidak berubah, abaikan unique check.
            if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
            }

            $validatedData = $request->validate($rules);

            // Handle Image Update
            if ($request->file('image')) {
                // Hapus gambar lama jika ada
                    if ($request->oldImage) {
                    Storage::delete($request->oldImage);
                }
                // Simpan gambar baru
                $validatedData['image'] = $request->file('image')->store('post-images');
            }

            // Tambahkan data excerpt dan user_id
            $validatedData['user_id'] = auth()->user()->id;
            $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

            // Update Data
            Post::where('id', $post->id)
                ->update($validatedData);

            return redirect('/dashboard/posts')->with('success', 'Post has been updated!');
        }


        public function destroy(Post $post)
        {
            // Mengecek policy sebelum delete (Tugas Praktek 3)
            Gate::authorize('delete', $post);

            // Hapus file gambar fisik jika ada
            if ($post->image) {
                Storage::delete($post->image);
            }

            // Hapus record dari database
            Post::destroy($post->id);

            return redirect('/dashboard/posts')->with('success', 'Post has been deleted!');
        }

        public function checkSlug(Request $request)
        {
            $slug = \Illuminate\Support\Str::slug($request->title);
            return response()->json(['slug' => $slug]);
        }
}