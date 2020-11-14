<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css.map') }}" rel="stylesheet">
</head>
<body>

<nav class="nawigacjaStronaGlowna">
        <div class="menu">
        <!-- <i class="fas fa-bars"></i> -->
        <span class="logo">MediHelper</span>
        </div>
        <div class="nawigacjaLinki">
        @guest
            <a class="nav-link" href="{{ route('login') }}">{{ __('Logowanie') }}</a>
        @if (Route::has('register'))
            <a class="nav-link" href="{{ route('register') }}">{{ __('Rejestracja') }}</a>
        @endif
        @else
        
         <a class="dropdown-item" href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
              {{ __('Wyloguj') }}
          </a>

         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
          </form>
        @endguest
        </div>

</nav>

        <main class="py-4">
            @yield('content')
        </main>


        <script src="{{ '../resources/js/script.js' }}"></script>
</body>
</html>
