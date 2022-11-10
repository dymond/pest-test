<x-layouts.app>
    <x-slot name="header">
        Sign Up
    </x-slot>
    <form action="/register" method="post" class="mt-4 space-y-4">
        @csrf
        <div class="space-y-1">
            <label for="name" class="block">Name</label>
            <input type="text" name="name" id="name" placeholder="Full Name" class="bg-transparent rounded block w-full">
        </div>
        <div class="space-y-1">
            <label for="email" class="block">Email</label>
            <input type="email" name="email" id="email" placeholder="your@email.com" class="bg-transparent rounded block w-full">
        </div>
        <div class="space-y-1">
            <label for="password" class="block">Password</label>
            <input type="password" name="password" id="password" class="bg-transparent rounded block w-full">
        </div>
        <button type="submit" class="border border-gray-700 bg-white/5 hover:bg-white/0 px-3 py-2 rounded transition duration-500 ease-in-out">
            Create Account
        </button>
    </form>
</x-layouts.app>
