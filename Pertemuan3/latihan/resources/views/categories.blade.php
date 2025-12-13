<x-layout>
    <x-slot:title>Kategori</x-slot:title>

    <div class="py-8 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="border-b border-gray-200 pb-4 mb-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Daftar Kategori</h1>
            <p class="mt-2 text-base text-gray-500">Temukan berbagai artikel menarik berdasarkan kategori favorit Anda.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($categories as $category)
                {{-- Link ini mengarah ke /posts?category=slug (Filter Post) --}}
                <a href="/posts?category={{ $category->slug }}" class="group relative overflow-hidden rounded-2xl bg-gray-900 shadow-lg transition duration-300 hover:-translate-y-1 hover:shadow-2xl h-64">
                    
                    {{-- Background Image (Placeholder Random Aesthetic) --}}
                    {{-- Kita pakai nama kategori sebagai 'seed' agar gambarnya konsisten per kategori --}}
                    <img src="https://picsum.photos/seed/{{ $category->name }}/600/400" 
                         alt="{{ $category->name }}" 
                         class="absolute inset-0 h-full w-full object-cover opacity-60 transition duration-500 group-hover:scale-110 group-hover:opacity-70">
                    
                    {{-- Overlay Gradient agar teks terbaca --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent"></div>

                    {{-- Content --}}
                    <div class="absolute bottom-0 p-6 w-full">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-2xl font-bold text-white tracking-wide group-hover:text-blue-300 transition-colors">
                                    {{ $category->name }}
                                </h3>
                                <p class="text-sm text-gray-300 mt-1 opacity-0 transform translate-y-2 transition duration-300 group-hover:opacity-100 group-hover:translate-y-0">
                                    View all posts &rarr;
                                </p>
                            </div>
                            
                            {{-- Icon / Badge (Optional) --}}
                            <div class="bg-white/20 backdrop-blur-sm p-2 rounded-full text-white opacity-80 group-hover:bg-blue-600/80 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-layout>