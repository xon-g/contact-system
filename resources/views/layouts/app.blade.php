<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Contact System') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <style>
        .navbar {
            background-color: #0A0F49;
            color: #F7992F;
            padding: 1em;
            text-align: center;

            .container {
                max-width: 1200px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin: 0 auto;

                .navbar-nav {
                    display: flex;
                    gap: 1.5em;
                }
            }
        }

        .navbar-brand {
            font-size: 1.5em;
            font-weight: bold;
        }

        .nav-link {
            color: #F7992F;
            text-decoration: none;
        }

        .nav-link:hover {
            color: #ffffff;
        }

        .main-content {
            padding: 2em;
            height: 100vh;
        }

        .footer {
            background-color: #0A0F49;
            color: #F7992F;
            padding: 1em;
            text-align: center;
            clear: both;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="navbar">
            <div class="container">
                <a href="{{ url('/') }}" class="navbar-brand">
                    {{ config('app.name', 'Contact System') }}
                </a>
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item">
                            <a href="{{ route('contacts.create') }}" class="nav-link">Add Contact</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contacts.index') }}" class="nav-link">Contacts</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="nav-link">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="main-content">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="footer" style="position: fixed; bottom: 0; width: 100%;">
            <p>&copy; {{ date('Y') }} {{ config('app.name', 'Contact System') }}. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>