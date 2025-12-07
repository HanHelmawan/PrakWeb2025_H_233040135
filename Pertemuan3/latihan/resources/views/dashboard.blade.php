<x-dashboard-layout>
    <x-slot:title>
        Dashboard
    </x-slot:title>

    <h1 class="text-4x1 font-bold text-gray-800 mb-4">Welcome, {{ auth()->user()->name() }}</h1>

    @include('components.table')
</x-dashboard-layout>
