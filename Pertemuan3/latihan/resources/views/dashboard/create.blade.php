<x-dashboard-layout>
    <x-slot:title>Buat Post Baru</x-slot:title>

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
        trix-editor {
            min-height: 300px !important;
        }
    </style>

    <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        
        {{-- Header Section --}}
        <div class="md:flex md:items-center md:justify-between mb-8">
            <div class="min-w-0 flex-1">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Buat Post Baru</h2>
                <p class="mt-1 text-sm text-gray-500">Buat artikel menarik baru untuk pembaca Anda.</p>
            </div>
        </div>

        {{-- Form Card --}}
        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
            <div class="p-8">
                <form method="post" action="/dashboard/posts" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    {{-- 1. Title --}}
                    <div>
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                        <div class="mt-2">
                            <input type="text" name="title" id="title" 
                                class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('title') ring-red-500 @enderror" 
                                value="{{ old('title') }}" required autofocus placeholder="Masukkan judul postingan...">
                        </div>
                        @error('title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- 2. Slug --}}
                    <div>
                        <div class="flex justify-between">
                            <label for="slug" class="block text-sm font-medium leading-6 text-gray-900">Slug (URL)</label>
                            <span class="text-xs text-gray-500">Otomatis terisi dari Title</span>
                        </div>
                        <div class="mt-2">
                            <input type="text" name="slug" id="slug" 
                                class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 bg-gray-50" 
                                value="{{ old('slug') }}" required placeholder="judul-postingan-anda">
                        </div>
                        @error('slug')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- 3. Category --}}
                    <div>
                        <label for="category" class="block text-sm font-medium leading-6 text-gray-900">Category</label>
                        <div class="mt-2">
                            <select id="category" name="category_id" 
                                class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- 4. Image --}}
                    <div>
                        <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Post Image</label>
                        <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10 bg-gray-50">
                            <div class="text-center">
                                {{-- Preview Image Container (Awalnya Hidden) --}}
                                <img class="img-preview mb-4 max-h-64 mx-auto rounded-lg shadow-md hidden object-cover">

                                {{-- Icon Upload (Disembunyikan jika ada preview) --}}
                                <div id="upload-icon-wrapper">
                                    <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                    </svg>
                                    <div class="mt-4 flex text-sm leading-6 text-gray-600 justify-center">
                                        <label for="image" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                            <span>Upload a file</span>
                                            <input id="image" name="image" type="file" class="sr-only" onchange="previewImage()">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 2MB</p>
                                </div>
                            </div>
                        </div>
                        @error('image')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- 5. Body (Trix Editor) --}}
                    <div>
                        <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Body</label>
                        <p class="text-xs text-gray-500 mb-2">Tulis konten artikel lengkap di bawah ini.</p>
                        
                        @error('body')
                            <p class="text-sm text-red-600 mb-2">{{ $message }}</p>
                        @enderror
                        
                        <div class="mt-2">
                            <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                            <trix-editor input="body" class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 bg-white"></trix-editor>
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex items-center justify-end gap-x-4 border-t border-gray-900/10 pt-6">
                        <a href="/dashboard/posts" class="rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Cancel</a>
                        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create Post</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    {{-- Scripts --}}
    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        // Fitur Auto-Slug
        title.addEventListener('change', function() {
            fetch('/dashboard/posts/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        // Mencegah fitur upload file bawaan Trix (karena kita pakai input file terpisah)
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

        // Script Preview Image yang Lebih Canggih
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');
            const uploadWrapper = document.querySelector('#upload-icon-wrapper');

            imgPreview.style.display = 'block';
            uploadWrapper.style.display = 'none'; // Sembunyikan icon upload biar rapi

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
                imgPreview.classList.remove('hidden');
            }
        }
    </script>
</x-dashboard-layout>