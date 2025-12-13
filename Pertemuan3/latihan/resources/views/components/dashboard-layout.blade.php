<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'My Application' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
</head>

<body class="bg-gradient-to-br from-white via-blue-50 to-blue-100 min-h-screen flex flex-col font-sans">
    
    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 shadow-sm mb-8 border-b border-white/50">
        
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            
            {{-- Bagian kiri navbar --}}
            <div class="flex gap-6">
                <a href="/home" class="text-gray-700 hover:text-blue-600 font-semibold transition">Home</a>
                <a href="/about" class="text-gray-700 hover:text-blue-600 font-semibold transition">About</a>
                <a href="/blog" class="text-gray-700 hover:text-blue-600 font-semibold transition">Blog</a>
                <a href="/categories" class="text-gray-700 hover:text-blue-600 font-semibold transition">Categories</a>
                <a href="/posts" class="text-gray-700 hover:text-blue-600 font-semibold transition">Post</a>
                <a href="/contact" class="text-gray-700 hover:text-blue-600 font-semibold transition">Contact</a>
            </div>

            {{-- Bagian kanan navbar --}}
            <div class="flex gap-4 items-center">
                @auth
                    {{-- JIKA SUDAH LOGIN --}}
                    <span class="text-gray-500 text-sm font-medium hidden sm:block">Hi, {{ auth()->user()->name }}</span>
                    
                    <a href="/dashboard" class="text-gray-700 hover:text-blue-600 font-semibold transition">Dashboard</a>
                    
                    <form action="/logout" method="post" class="inline">
                        @csrf
                        <button type="submit" class="text-red-600 hover:text-red-800 font-semibold transition ml-2">
                            Logout
                        </button>
                    </form>
                @else
                    {{-- JIKA BELUM LOGIN --}}
                    <a href="/login" class="text-gray-700 hover:text-blue-600 font-semibold transition">Login</a>
                    <a href="/register" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 font-semibold transition text-sm">Register</a>
                @endauth
            </div>

        </div>
    </nav>

    <main class="flex-1 container mx-auto px-4">
        {{ $slot }}
    </main>


    <footer class="bg-white/50 backdrop-blur-sm border-t border-white/60 text-gray-600 py-6 mt-12">
        <div class="container mx-auto px-4 flex flex-col items-center">
            <div class="mb-2">&copy; {{ date('Y') }} My Laravel App &mdash; All rights reserved.</div>
            <div class="flex gap-4">
                <a href="https://github.com/" target="_blank" class="hover:text-blue-600 transition">GitHub</a>
                <a href="https://twitter.com/" target="_blank" class="hover:text-blue-600 transition">Twitter</a>
                <a href="mailto:info@example.com" class="hover:text-blue-600 transition">Email</a>
            </div>
        </div>
    </footer>
</body>
</html>