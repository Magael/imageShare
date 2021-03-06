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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- JS -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">

<nav class="flex items-center justify-between flex-wrap bg-gray-700 p-6">
    <div class="flex items-center flex-shrink text-gray-50 mr-6">
        <span class="uppercase font-bold text-5xl tracking-tight"><a href="/" class="no-underline text-gray-50 hover:no-underline text-gray-50">{{ config('app.name', 'ImageShare') }}</a></span>
    </div>
    <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
        <div class="text-xl lg:flex-grow">
            <div class="flex flex-col">
                @if(Route::has('login'))
                    <div class="absolute top-0 right-0 mt-4 mr-4 space-x-4 sm:mt-6 sm:mr-6 sm:space-x-6">
                        @auth
                            <a href="/blog" class="no-underline hover:underline text-2xl font-normal text-gray-200">Blog</a>
                            <a href="{{ route('user.profile') }}"
                               class="no-underline hover:underline text-2xl font-normal text-gray-200">{{ __('Profile') }}</a>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                               class="no-underline hover:underline text-2xl font-normal text-gray-200">{{ __('Logout') }}</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                                @csrf
                            </form>
                        @else
                            <a href="{{ route('login') }}"
                               class="no-underline hover:underline text-2xl font-normal text-gray-200">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                   class="no-underline hover:underline text-2xl font-normal text-gray-200">{{ __('Register') }}</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>

    </div>
</nav>

@can('logged-in')
<nav class="flex items-center justify-between flex-wrap bg-gray-500 p-6 mb-5">
    <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
        <div class="text-xl lg:flex-grow">
            <a href="/" class="no-underline hover:underline text-2xl font-normal text-gray-200">
                Home
            </a>
            @can('is-admin')
            <a href="{{ route('admin.users.index') }}" class="no-underline hover:underline text-2xl font-normal text-gray-200">
                Users
            </a>
            @endcan
        </div>
    </div>
</nav>
@endcan

<main class="container">
    @include('partials.alerts')
    @yield('content')
</main>
</body>
</html>
