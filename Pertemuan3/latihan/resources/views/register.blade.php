<x-layout>
    <x-slot:title>Register</x-slot:title>
    <div class="max-w-md mx-auto mt-10 bg-white p-8 rounded shadow">
        <h1 class="text-2xl font-bold mb-6">Register</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-4">
                <label for="name" class="block mb-1 font-medium">Nama</label>
                <input type="text" name="name" id="name" required autofocus class="w-full border px-3 py-2 rounded" value="{{ old('name') }}">
            </div>
            <div class="mb-4">
                <label for="username" class="block mb-1 font-medium">Username</label>
                <input type="text" name="username" id="username" required class="w-full border px-3 py-2 rounded" value="{{ old('username') }}">
            </div>
            <div class="mb-4">
                <label for="email" class="block mb-1 font-medium">Email</label>
                <input type="email" name="email" id="email" required class="w-full border px-3 py-2 rounded" value="{{ old('email') }}">
            </div>
            <div class="mb-4">
                <label for="password" class="block mb-1 font-medium">Password</label>
                <input type="password" name="password" id="password" required class="w-full border px-3 py-2 rounded">
            </div>
            <div class="mb-6">
                <label for="password_confirmation" class="block mb-1 font-medium">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required class="w-full border px-3 py-2 rounded">
            </div>
            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">Register</button>
        </form>
    </div>
</x-layout>