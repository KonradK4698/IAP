<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel użytkownika</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.23/b-1.6.5/r-2.2.6/sc-2.0.3/sb-1.0.1/sp-1.2.2/datatables.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css.map') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <a href="{{route('home')}}"> Panel </a>
    <a href="{{route('daneUzytkownika')}}"> Dane użytkownika </a>
    <a href="{{route('daneDodatkowe')}}"> Dane dodatkowe </a>
    <a href="{{route('pomiarCisnienia')}}"> Pomiar cisnienia </a>
    <a href="{{route('bazaLekow')}}"> Baza lekow </a>
    <a href="{{route('twojeLeki')}}"> Twoje leki </a>
    <a href="{{route('wydarzenia')}}"> Dodaj wydarzenie </a>
    <a href="{{route('raport')}}"> Raport </a>
    @can('admin')
    <a href="{{route('panelAdmina')}}"> Administracja </a>
    @endcan
</aside>

<div class="glownyDiv">
@if ($errors->any())
<div class="errorContener">
    <p>Wystąpiły błędy!!!</p>
    @foreach ($errors->all() as $error)
        <span>{{ $error }}</span>
    @endforeach
</div>
@endif
    @yield('content')
</div>


<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script src="{{ asset('js/script.js') }}"></script>

<link href="{{ asset('fontawesome/js/all.js') }}" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/b-1.6.5/r-2.2.6/sc-2.0.3/sb-1.0.1/sp-1.2.2/datatables.min.js"></script>
@extends('amcharts')
</body>
</html>