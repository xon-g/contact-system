<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Contact System') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <nav class="bg-gray-800 p-4">
            <div class="container mx-auto flex justify-between">
                <a href="{{ url('/') }}" class="text-white font-bold text-xl">
                    {{ config('app.name', 'Contact System') }}
                </a>
                <ul class="flex space-x-6 text-white">
                    @auth
                        <li>
                            <a href="{{ route('contacts.create') }}" class="hover:text-gray-400">Add Contact</a>
                        </li>
                        <li>
                            <a href="{{ route('contacts.index') }}" class="hover:text-gray-400">Contacts</a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="hover:text-gray-400">Logout</button>
                            </form>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}" class="hover:text-gray-400">Login</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}" class="hover:text-gray-400">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="flex-grow container mx-auto p-6">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-gray-800 p-4 text-center text-white">
            <p>&copy; {{ date('Y') }} {{ config('app.name', 'Contact System') }}. All rights reserved.</p>
        </footer>
    </div>
</body>
</html> 