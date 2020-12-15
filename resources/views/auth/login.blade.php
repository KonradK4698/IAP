@extends('layouts.app')

@section('content')


<div class="kontenerLogowanie"></div>
    <form method="POST" action="{{ route('login') }}" class="formularzLogowanie">
        @csrf
        <span class="naglowekLogowanie"> Logowanie </span>
        <div class="elementyLogowania">
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="inputLogin" placeholder="Podaj email">

            <input id="password" type="password" name="password" required autocomplete="current-password" class="inputLogin" placeholder="Podaj haslo">

            <div class="kontenerZapamietaj">
                <span >Zapamietaj</span>
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                
            </div>

            <div class="przyciskiLogowanie">
                <button type="submit" class="zaloguj">Zaloguj</button>
                <a href="{{ route('password.request') }}" class="przypominjHaslo">Zapomniałeś hasła?</a>
            </div>

        </div>
    </form>




@endsection
