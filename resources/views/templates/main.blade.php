<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ImageShare') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!-- JS -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">

<nav class="flex items-center justify-between flex-wrap bg-gray-700 p-6 mb-5">
    <div class="flex items-center flex-shrink-0 text-white mr-6">
        <span class="font-semibold text-xl tracking-tight">{{ config('app.name', 'ImageShare') }}</span>
    </div>
    <div class="block lg:hidden">
        <button
            class="flex items-center px-3 py-2 border rounded text-gray-200 border-teal-400 hover:text-white hover:border-white">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
            </svg>
        </button>
    </div>
    <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
        <div class="text-sm lg:flex-grow">
            <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white mr-4">
                Home
            </a>
            <a href="{{ route('admin.users.index') }}" class="block mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white mr-4">
                Users
            </a>
            {{--<a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white">
                Blog
            </a>
        </div>
        <div>
            <a href="#" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">Download</a>--}}
        </div>
        <div class="text-sm lg:flex-grow">
            <div class="flex flex-col">
                @if(Route::has('login'))
                    <div class="absolute top-0 right-0 mt-4 mr-4 space-x-4 sm:mt-6 sm:mr-6 sm:space-x-6">
                        @auth
                            <a href="{{ url('/home') }}"
                               class="no-underline hover:underline text-sm font-normal text-gray-200">{{ __('Home') }}</a>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                               class="no-underline hover:underline text-sm font-normal text-gray-200">{{ __('Logout') }}</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                                @csrf
                            </form>
                        @else
                            <a href="{{ route('login') }}"
                               class="no-underline hover:underline text-sm font-normal text-gray-200">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                   class="no-underline hover:underline text-sm font-normal text-gray-200">{{ __('Register') }}</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>

    </div>
</nav>

<main class="container">
    @include('partials.alerts')
    @yield('content')
</main>
</body>
</html>
