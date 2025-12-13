<x-layout>
  <x-slot:title>Home</x-slot:title>

  {{-- Container Utama: Flexbox Centered --}}
  <div class="flex flex-col items-center justify-center min-h-[80vh] px-4 text-center">
    
    {{-- Judul --}}
    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">
      Selamat Datang di Blog Saya
    </h1>
    
    {{-- Deskripsi Singkat --}}
    <p class="mt-6 text-lg leading-8 text-gray-600 max-w-2xl">
      Temukan berbagai tulisan menarik, ide kreatif, dan wawasan terbaru yang saya bagikan di sini.
    </p>
    
    {{-- Button ke halaman post --}}
    <div class="mt-10">
      <a href="/posts" class="rounded-md bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition duration-300">
        Jelajahi Postingan
      </a>
    </div>

  </div>
</x-layout>