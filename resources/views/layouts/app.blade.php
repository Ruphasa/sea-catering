<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SEA Catering') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">

    <link rel="stylesheet" href="{{ asset('build/assets/app-CFA7UN_V.css') }}">
    <script src="{{ asset('build/assets/app-DaBYqt0m.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-50">
        <nav class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">
                    <div class="flex items-center">
                        <a href="{{ route('home') }}" class="text-xl font-bold text-blue-600 flex items-center">
                            <i class="fas fa-utensils mr-2"></i> SEA Catering
                        </a>
                        <div class="hidden sm:flex sm:space-x-6 ml-10">
                            <a href="{{ route('home') }}"
                                class="{{ request()->routeIs('home') ? 'border-b-2 border-blue-500 text-blue-600' : 'border-b-2 border-transparent hover:border-blue-500 text-gray-700 hover:text-gray-900' }} inline-flex items-center px-3 py-2 text-sm font-medium"><i
                                    class="fas fa-home mr-1"></i> Home</a>
                            @if (auth()->check() && auth()->user()->is_admin)
                                <a href="{{ route('admin') }}"
                                    class="{{ request()->routeIs('admin') ? 'border-b-2 border-blue-500 text-blue-600' : 'border-b-2 border-transparent hover:border-blue-500 text-gray-700 hover:text-gray-900' }} inline-flex items-center px-3 py-2 text-sm font-medium"><i
                                        class="fas fa-tachometer-alt mr-2"></i> Dashboard</a>
                            @else
                                <a href="{{ route('dashboard') }}"
                                    class="{{ request()->routeIs('dashboard') ? 'border-b-2 border-blue-500 text-blue-600' : 'border-b-2 border-transparent hover:border-blue-500 text-gray-700 hover:text-gray-900' }} inline-flex items-center px-3 py-2 text-sm font-medium"><i
                                        class="fas fa-tachometer-alt mr-2"></i> Dashboard</a>
                            @endif
                            <a href="{{ route('menu') }}"
                                class="{{ request()->routeIs('menu') ? 'border-b-2 border-blue-500 text-blue-600' : 'border-b-2 border-transparent hover:border-blue-500 text-gray-700 hover:text-gray-900' }} inline-flex items-center px-3 py-2 text-sm font-medium"><i
                                    class="fas fa-list mr-1"></i> Meal Plans</a>
                            <a href="{{ route('contact') }}"
                                class="{{ request()->routeIs('contact') ? 'border-b-2 border-blue-500 text-blue-600' : 'border-b-2 border-transparent hover:border-blue-500 text-gray-700 hover:text-gray-900' }} inline-flex items-center px-3 py-2 text-sm font-medium"><i
                                    class="fas fa-envelope mr-1"></i> Contact Us</a>
                        </div>
                    </div>
                    <div class="hidden sm:flex items-center space-x-4">
                        @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="border-b-2 border-transparent hover:border-blue-500 text-gray-700 hover:text-gray-900 inline-flex items-center px-3 py-2 text-sm font-medium"><i
                                        class="fas fa-sign-out-alt mr-1"></i> Logout</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}"
                                class="border-b-2 border-transparent hover:border-blue-500 text-gray-700 hover:text-gray-900 inline-flex items-center px-3 py-2 text-sm font-medium"><i
                                    class="fas fa-sign-in-alt mr-1"></i> Login</a>
                        @endauth
                    </div>
                    <div class="sm:hidden flex items-center">
                        <button id="mobile-menu-button" class="text-gray-700 hover:text-blue-500 focus:outline-none">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div id="mobile-menu" class="sm:hidden hidden bg-white shadow-md">
                <a href="{{ route('home') }}"
                    class="{{ request()->routeIs('home') ? 'block border-l-4 border-blue-500 bg-gray-100' : 'block border-l-4 border-transparent hover:bg-gray-100' }} px-4 py-2 text-gray-700 hover:text-blue-500 flex items-center"><i
                        class="fas fa-home mr-2"></i> Home</a>
                @if (auth()->check() && auth()->user()->is_admin)
                    <a href="{{ route('admin') }}"
                        class="{{ request()->routeIs('admin') ? 'block border-l-4 border-blue-500 bg-gray-100' : 'block border-l-4 border-transparent hover:bg-gray-100' }} px-4 py-2 text-gray-700 hover:text-blue-500 flex items-center"><i
                            class="fas fa-tachometer-alt mr-2"></i> Dashboard</a>
                @else
                    <a href="{{ route('dashboard') }}"
                        class="{{ request()->routeIs('dashboard') ? 'block border-l-4 border-blue-500 bg-gray-100' : 'block border-l-4 border-transparent hover:bg-gray-100' }} px-4 py-2 text-gray-700 hover:text-blue-500 flex items-center"><i
                            class="fas fa-tachometer-alt mr-2"></i> Dashboard</a>
                @endif
                <a href="{{ route('menu') }}"
                    class="{{ request()->routeIs('menu') ? 'block border-l-4 border-blue-500 bg-gray-100' : 'block border-l-4 border-transparent hover:bg-gray-100' }} px-4 py-2 text-gray-700 hover:text-blue-500 flex items-center"><i
                        class="fas fa-list mr-2"></i> Meal Plans</a>
                <a href="{{ route('contact') }}"
                    class="{{ request()->routeIs('contact') ? 'block border-l-4 border-blue-500 bg-gray-100' : 'block border-l-4 border-transparent hover:bg-gray-100' }} px-4 py-2 text-gray-700 hover:text-blue-500 flex items-center"><i
                        class="fas fa-envelope mr-2"></i> Contact Us</a>
                @auth
                    <form method="POST" action="{{ route('logout') }}"
                        class="block border-l-4 border-transparent hover:bg-gray-100">
                        @csrf
                        <button type="submit"
                            class="w-full text-left px-4 py-2 text-gray-700 hover:text-blue-500 flex items-center"><i
                                class="fas fa-sign-out-alt mr-2"></i> Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="block border-l-4 border-transparent hover:bg-gray-100 px-4 py-2 text-gray-700 hover:text-blue-500 flex items-center"><i
                            class="fas fa-sign-in-alt mr-2"></i> Login</a>
                @endauth
            </div>
        </nav>

        <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            @yield('content')
        </main>
    </div>

    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
    @yield('scripts')
</body>

</html>
