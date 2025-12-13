<x-dashboard-layout>
    <x-slot:title>My Posts</x-slot:title>

    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-900">My Posts</h2>
            <a href="/dashboard/posts/create" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">
                Create New Post
            </a>
        </div>

        {{-- 1. Bagian Alert (Kode Anda) --}}
        @if(session('success'))
        <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 border border-green-300" role="alert">
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

        {{-- 2. Tabel Daftar Post --}}
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">#</th>
                        <th scope="col" class="px-6 py-3">Title</th>
                        <th scope="col" class="px-6 py-3">Category</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $post->title }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $post->category->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{-- Tombol Show (Opsional) --}}
                            <a href="/dashboard/posts/{{ $post->slug }}" class="font-medium text-blue-600 hover:underline mr-2">Show</a>
                            
                            {{-- Tombol Edit --}}
                            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="font-medium text-yellow-600 hover:underline mr-2">Edit</a>

                            {{-- 3. TOMBOL DELETE (Kode yang Anda tanyakan) --}}
                            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="inline-block">
                                @method('delete')
                                @csrf
                                <button class="font-medium text-red-600 hover:underline" onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>
</x-dashboard-layout>