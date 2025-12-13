<x-layout>
  <x-slot:title>Register</x-slot:title>

  {{-- Tambahkan bg-gray-50 di sini agar background halaman jadi abu-abu tipis --}}
  <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 bg-gray-50">
    
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Registration</h2>
    </div>

    {{-- CARD: Tambahkan bg-white, shadow-lg, rounded-xl, dan padding (p-8) di sini --}}
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm bg-white p-8 shadow-lg rounded-xl border border-gray-100">
      
      <form class="space-y-6" action="/register" method="POST">
        @csrf

        {{-- 1. Name --}}
        <div>
          <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
          <div class="mt-2">
            <input id="name" name="name" type="text" value="{{ old('name') }}" required 
              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('name') ring-2 ring-red-500 @enderror">
            @error('name')
              <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
          </div>
        </div>

        {{-- 2. Username --}}
        <div>
          <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
          <div class="mt-2">
            <input id="username" name="username" type="text" value="{{ old('username') }}" required 
              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('username') ring-2 ring-red-500 @enderror">
            @error('username')
              <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
          </div>
        </div>

        {{-- 3. Email --}}
        <div>
          <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
          <div class="mt-2">
            <input id="email" name="email" type="email" value="{{ old('email') }}" required 
              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('email') ring-2 ring-red-500 @enderror">
            @error('email')
              <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
          </div>
        </div>

        {{-- 4. Password --}}
        <div>
          <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
          <div class="mt-2">
            <input id="password" name="password" type="password" required 
              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('password') ring-2 ring-red-500 @enderror">
            @error('password')
              <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
          </div>
        </div>

        {{-- 5. Confirm Password --}}
        <div>
          <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">Confirm Password</label>
          <div class="mt-2">
            <input id="password_confirmation" name="password_confirmation" type="password" required 
              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div>
          <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
        </div>
      </form>

      <p class="mt-10 text-center text-sm text-gray-500">
        Already registered?
        <a href="/login" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Login</a>
      </p>
    </div>
  </div>
</x-layout>