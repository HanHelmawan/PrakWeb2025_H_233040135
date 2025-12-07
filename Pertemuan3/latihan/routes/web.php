<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardPostController; 
use App\Http\Controllers\LoginController; 
use App\Http\Controllers\RegisterController; 
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// 1. Halaman Home
Route::get('/home', function () {
    return view('home', ['title' => 'Home Page']);
});

// 2. Halaman About
Route::get('/about', function () {
    return view('about', ['title' => 'About Page']);
});

Route::get('/blog', function () {
    return view('blog', ['title' => 'Blog Page']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Page']);
});

// 3. Halaman Posts (Public)
Route::get('/posts', [PostController::class, 'index'])->middleware('auth')->name('posts.index');
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->middleware('auth')->name('posts.show');

// 4. Halaman Categories
Route::get('/categories', [CategoryController::class, 'index']);

// --- AUTHENTICATION ROUTES  ---
Route::get('/login', [LoginController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'register'])->middleware('guest');


Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// --- DASHBOARD ROUTES  ---
Route::get('/dashboard', [DashboardPostController::class, 'index'])->middleware('auth', 'verified')->name('dashboard.index');
Route::get('/dashboard/create', [DashboardPostController::class, 'create'])->middleware('auth', 'verified')->name('dashboard.create');
Route::post('/dashboard', [DashboardPostController::class, 'store'])->middleware('auth', 'verified')->name('dashboard.store');
Route::get('/dashboard/{post:slug}', [DashboardPostController::class, 'show'])->middleware('auth', 'verified')->name('dashboard.show');
