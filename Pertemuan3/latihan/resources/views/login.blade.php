<x-layout>
    <x-slot:title>Login</x-slot:title>
    <div class="max-w-md mx-auto mt-10 bg-white p-8 rounded shadow">
        <h1 class="text-2xl font-bold mb-6">Login</h1>

        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block mb-1 font-medium">Email</label>
                <input type="email" name="email" id="email" required autofocus class="w-full border px-3 py-2 rounded" value="{{ old('email') }}">
            </div>
            <div class="mb-6">
                <label for="password" class="block mb-1 font-medium">Password</label>
                <input type="password" name="password" id="password" required class="w-full border px-3 py-2 rounded">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Login</button>
        </form>
    </div>

</x-layout>