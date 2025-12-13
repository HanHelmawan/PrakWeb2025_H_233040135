<x-dashboard-layout>
    <x-slot:title>
        {{ $post->title }}
    </x-slot:title>

    <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        
        {{-- Tombol Navigasi & Action --}}
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
            {{-- Back Button --}}
            <a href="/dashboard/posts" class="inline-flex items-center text-gray-600 hover:text-indigo-600 font-medium transition duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to Dashboard
            </a>

            {{-- Action Buttons (Edit & Delete) --}}
            <div class="flex items-center gap-3">
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="inline-flex items-center px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-white text-sm font-medium rounded-lg transition duration-200 shadow-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    Edit
                </a>
                
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="inline-block">
                    @method('delete')
                    @csrf
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition duration-200 shadow-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus postingan ini?')">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        Delete
                    </button>
                </form>
            </div>
        </div>

        {{-- Card Konten Utama --}}
        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
            
            {{-- Gambar Header --}}
            @if($post->image)
            <div class="w-full h-96 overflow-hidden">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
            </div>
            @else
            <div class="w-full h-64 bg-gray-100 flex items-center justify-center text-gray-400">
                <span class="text-lg font-medium">No Image Available</span>
            </div>
            @endif

            <div class="p-8">
                {{-- Judul & Meta --}}
                <header class="mb-8 border-b border-gray-100 pb-8">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="bg-indigo-100 text-indigo-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                            {{ $post->category->name }}
                        </span>
                        <span class="text-gray-400 text-sm">•</span>
                        <span class="text-gray-500 text-sm">{{ $post->created_at->format('d M Y') }}</span>
                    </div>
                    
                    <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-4 leading-tight">
                        {{ $post->title }}
                    </h1>
                    
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 font-bold mr-3">
                            {{ substr($post->author->name, 0, 1) }}
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">
                                {{ $post->author->name }}
                            </p>
                            <p class="text-xs text-gray-500">Author</p>
                        </div>
                    </div>
                </header>

                {{-- Isi Artikel (Body) --}}
                <article class="prose prose-lg prose-indigo max-w-none text-gray-700 leading-relaxed">
                    {!! $post->body !!}
                </article>
            </div>
        </div>

    </div>
</x-dashboard-layout>