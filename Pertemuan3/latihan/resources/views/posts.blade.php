<x-layout>
    <x-slot:title>Blog Posts</x-slot:title>

    <div class="py-8 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <h1 class="mb-8 text-3xl font-bold text-gray-900">Daftar Posts</h1>

        {{-- BAGIAN ALERT SUKSES (TAILWIND STYLE) --}}
        @if(session()->has('success'))
        <div class="flex items-center p-4 mb-6 text-sm text-green-800 rounded-lg bg-green-50 border border-green-300" role="alert">
            <svg class="w-4 h-4 me-2 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11v2m0 2v2m0 2v2M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
            </svg>
            <p class="flex-1"><span class="font-medium me-1">Success!</span> {{ session('success') }}</p>
            <button type="button" onclick="this.parentElement.remove()" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
        @endif
        {{-- BATAS AKHIR ALERT --}}

        @foreach ($posts as $post)
            <article class="py-8 max-w-3xl border-b border-gray-200">
                <a href="/posts/{{ $post->slug }}">
                    <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900 hover:underline">{{ $post->title }}</h2>
                </a>
                <div class="text-base text-gray-500 mb-4">
                    By <a href="#" class="hover:underline text-base text-gray-500">{{ $post->author->name ?? 'User' }}</a> in <a href="#" class="hover:underline text-base text-gray-500">{{ $post->category->name ?? 'Category' }}</a> | {{ $post->created_at->diffForHumans() }}
                </div>
                <p class="font-light text-gray-500 text-justify">
                    {{ $post->excerpt }}
                </p>
                <a href="/posts/{{ $post->slug }}" class="inline-flex items-center font-medium text-blue-600 hover:underline mt-4">
                    Read more &raquo;
                </a>
            </article>
        @endforeach
    </div>
</x-layout>