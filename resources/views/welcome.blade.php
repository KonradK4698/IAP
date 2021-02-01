<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Inteligenty Asystent Pacjenta</title>

        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css.map') }}" rel="stylesheet">
    </head>
    <body>
    <div class="tloSG">
    <span class="tytulSG"> Inteligentny Asystent Pacjenta </span>
            @if (Route::has('login'))
                <div class="kontenerLogin">
                    @auth
                    <div class="kontenerSG">
                        <span class="opisSG"> Witamy ponownie, kliknij poniższy przycisk i przejdź do panelu pacjenta </span>
                        <a class="przyciskSG" href="{{ url('/home') }}">Panel pacjenta</a>
                        </div>
                    @else
                        <div class="kontenerSG">
                        <span class="opisSG"> Posiadasz konto w aplikacji?<br/> Przejdź do logowania. </span>
                        <a class="przyciskSG" href="{{ route('login') }}">Logowanie</a>
                        </div>
                        @if (Route::has('register'))
                        <div class="kontenerSG">
                            <span class="opisSG"> Nie posiadasz konta w aplikacji?<br/> Przejdź do rejestracji. </span>
                            <a class="przyciskSG" href="{{ route('register') }}">Rejestracja</a>
                        </div>
                        @endif
                    @endauth
                </div>
            @endif
    </div>
    </body>
</html>
