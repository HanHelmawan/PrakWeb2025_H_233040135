<x-dashboard-layout>
    <x-slot:title>Dashboard</x-slot:title>

    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:px-6">
        
        {{-- Header Section --}}
        <div class="mx-auto max-w-screen-sm text-center lg:mb-10 mb-8">
            <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900">My Dashboard</h2>
            <p class="font-light text-gray-500 sm:text-xl">Kelola semua postingan artikel Anda di sini.</p>
        </div>

        {{-- Alert Notification --}}
        @if(session()->has('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
            <span class="font-medium">Success!</span> {{ session('success') }}
        </div>
        @endif

        {{-- Create Button --}}
        <div class="mb-6 flex justify-end">
            <a href="/dashboard/posts/create" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-indigo-700 rounded-lg hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Create New Post
            </a>
        </div>

        {{-- Table Card --}}
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white border border-gray-100">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                    <tr>
                        <th scope="col" class="px-6 py-3 w-10">#</th>
                        <th scope="col" class="px-6 py-3">Title</th>
                        <th scope="col" class="px-6 py-3">Category</th>
                        <th scope="col" class="px-6 py-3">Image</th> {{-- Kolom Baru --}}
                        <th scope="col" class="px-6 py-3 text-center w-48">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr class="bg-white border-b hover:bg-gray-50 transition duration-150">
                        {{-- Nomor Urut --}}
                        <td class="px-6 py-4 font-medium text-gray-900">
                            {{ $loop->iteration }}
                        </td>
                        
                        {{-- Judul --}}
                        <td class="px-6 py-4 font-semibold text-gray-900">
                            {{ $post->title }}
                        </td>
                        
                        {{-- Kategori --}}
                        <td class="px-6 py-4">
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded border border-blue-400">
                                {{ $post->category->name }}
                            </span>
                        </td>

                        {{-- Image Thumbnail --}}
                        <td class="px-6 py-4">
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="w-16 h-10 object-cover rounded-md border border-gray-200 shadow-sm">
                            @else
                                <div class="w-16 h-10 bg-gray-100 rounded-md border border-gray-200 flex items-center justify-center text-gray-400 text-xs">
                                    No Img
                                </div>
                            @endif
                        </td>

                        {{-- Action Buttons with Icons --}}
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center space-x-2">
                                
                                {{-- 1. View Icon (Mata) --}}
                                <a href="/dashboard/posts/{{ $post->slug }}" class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2 text-center inline-flex items-center" title="View Detail">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                </a>

                                {{-- 2. Edit Icon (Pensil) --}}
                                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm p-2 text-center inline-flex items-center" title="Edit Data">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </a>

                                {{-- 3. Delete Icon (Sampah) --}}
                                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="inline-block">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm p-2 text-center inline-flex items-center" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" title="Delete Data">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard-layout>