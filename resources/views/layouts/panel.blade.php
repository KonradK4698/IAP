<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css.map') }}" rel="stylesheet">
</head>
<body>
<nav class="nawigacjaStronaGlowna">
        <div class="menu">
        <i class="fas fa-bars"></i>
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

<aside class="submenu">
    <a href="{{route('daneUzytkownika')}}"> Dane użytkownika </a>
    <a href="{{route('daneDodatkowe')}}"> Dane dodatkowe </a>
    <a href="{{route('pomiarCisnienia')}}"> Pomiar cisnienia </a>
    <a href="{{route('bazaLekow')}}"> Baza lekow </a>
</aside>

<div class="glownyDiv">
    @yield('content')
</div>

<script src="{{ asset('js/script.js') }}"></script>
<link href="{{ asset('fontawesome/js/all.js') }}" rel="stylesheet">
</body>
</html>