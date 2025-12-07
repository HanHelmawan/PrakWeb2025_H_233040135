
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- flowbite --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col font-sans">
    <nav class="bg-white shadow mb-8">
        <div class="container mx-auto px-4 py-4 flex gap-6">
            <a href="/home" class="text-gray-700 hover:text-blue-600 font-semibold transition">Home</a>
            <a href="/about" class="text-gray-700 hover:text-blue-600 font-semibold transition">About</a>
            <a href="/blog" class="text-gray-700 hover:text-blue-600 font-semibold transition">Blog</a>
            <a href="/categories" class="text-gray-700 hover:text-blue-600 font-semibold transition">Categories</a>
            <a href="/posts" class="text-gray-700 hover:text-blue-600 font-semibold transition">Post</a>
            <a href="/contact" class="text-gray-700 hover:text-blue-600 font-semibold transition">Contact</a>
            <a href="/register" class="text-gray-700 hover:text-blue-600 font-semibold transition">Register</a>
            <a href="/login" class="text-gray-700 hover:text-blue-600 font-semibold transition">Login</a>
        </div>
    </nav>

    <main class="flex-1 container mx-auto px-4">
        {{ $slot }}
    </main>

    <footer class="bg-gray-800 text-gray-200 py-6 mt-12">
        <div class="container mx-auto px-4 flex flex-col items-center">
            <div class="mb-2">&copy; {{ date('Y') }} My Laravel App &mdash; All rights reserved.</div>
            <div class="flex gap-4">
                <a href="https://github.com/" target="_blank" class="hover:text-white transition">GitHub</a>
                <a href="https://twitter.com/" target="_blank" class="hover:text-white transition">Twitter</a>
                <a href="mailto:info@example.com" class="hover:text-white transition">Email</a>
            </div>
        </div>
    </footer>
</body>
</html>
