@extends('layouts.app')

@section('content')



<div class="kontenerLogowanie">

@if ($errors->any())
<div class="errorContener">
    <span class="closeError"> X </span>
    <p>Wystąpiły błędy!!!</p>
    @foreach ($errors->all() as $error)
        <span>{{ $error }}</span>
    @endforeach
</div>
@endif

    <form method="POST" action="{{ route('login') }}" class="formularzLogowanie">
        @csrf
        <span class="naglowekLogowanie"> Logowanie </span>
        <div class="elementyLogowania">
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="inputLogin" placeholder="Podaj email">

            <input id="password" type="password" name="password" required autocomplete="current-password" class="inputLogin" placeholder="Podaj haslo">

            <div class="kontenerZapamietaj">
                
                <input class="checkboxZapamietaj" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <span class="opisZapamietaj">Zapamietaj</span>
                
            </div>

            <div class="przyciskiLogowanie">
                <button type="submit" class="zaloguj">Zaloguj</button>
                <a href="{{ route('password.request') }}" class="przypominjHaslo">Przypomnij hasło</a>
            </div>

        </div>
    </form>
    </div>



@endsection
