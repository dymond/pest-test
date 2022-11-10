<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        @vite(['resources/css/app.css'])
    </head>
    <body class="antialiased bg-gray-900 text-gray-500 px-6">
        <div class="container">
            <div class="grid grid-cols-8 gap-12 mt-16">
                <nav class="col-span-1 border-r-2 border-gray-800 space-y-6">
                    @auth
                        <ul>
                            <li>
                                <span class="font-bold text-lg block py-1">
                                    {{ auth()->user()->name }}
                                </span>
                            </li>
                            <li>
                                <a href="#" class="font-bold hover:text-blue-500 block py-1">
                                    Feed
                                </a>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <a href="#" class="font-bold hover:text-blue-500 block py-1">
                                    My Stuff
                                </a>
                            </li>
                            <li>
                                <a href="/stuff/add" class="font-bold hover:text-blue-500 block py-1">
                                    Add Stuff
                                </a>
                            </li>
                            <li>
                                <a href="#" class="font-bold hover:text-blue-500 block py-1">
                                    Friends
                                </a>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <form action="logout" method="post">
                                    @csrf
                                    <button class="font-bold hover:text-blue-500 block py-1">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    @endauth
                    @guest
                        <ul>
                            <li>
                                <a href="/" class="font-bold hover:text-blue-500 block py-1">
                                    Home
                                </a>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <a href="/auth/login" class="font-bold hover:text-blue-500 block py-1">
                                    Login
                                </a>
                            </li>
                            <li>
                                <a href="/auth/register" class="font-bold hover:text-blue-500 block py-1">
                                    Register
                                </a>
                            </li>
                        </ul>
                    @endguest
                </nav>
                <div class="col-span-7">
                    @isset($header)
                        <h1 class="font-black text-4xl text-gray-700">
                            {{ $header }}
                        </h1>
                    @endisset
                    {{ $slot }}
                </div>
            </div>
        </div>
        @vite(['resources/js/app.js'])
    </body>
</html>
