<x-dashboard-layout>
    <x-slot:title>Edit Post</x-slot:title>
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900">Edit Post</h2>
        <form action="{{ route('dashboard.update', $post->slug) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            <x-posts.form :categories="$categories" :post="$post" />
        </form>
    </div>
</x-dashboard-layout>