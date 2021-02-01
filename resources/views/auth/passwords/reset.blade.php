@extends('layouts.app')

@section('content')
<div class="kontenerReset">

@if ($errors->any())
<div class="errorContener">
    <span class="closeError"> X </span>
    <p>Wystąpiły błędy!!!</p>
    @foreach ($errors->all() as $error)
        <span>{{ $error }}</span>
    @endforeach
</div>
@endif

    <form method="POST" action="{{ route('password.update') }}" class="uzupelnijDaneFormularz formularzReset">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">
        <span class="tytul"> Resetowanie hasła </span>
        <span class="opisPozycji"> Adres e-mail: </span>
        <input id="email" type="email" class="dodajDane" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

        <span class="opisPozycji"> Wprowadź nowe hasło </span>
        <input id="password" type="password" class="dodajDane" name="password" required autocomplete="new-password" placeholder="Nowe hasło">

        <span class="opisPozycji"> Wprowadź ponownie nowe hasło </span>
        <input id="password-confirm" type="password" class="dodajDane" name="password_confirmation" required autocomplete="new-password" placeholder="Potwierdź nowe hasło">
  


        <button type="submit" class="przyciskEmail"> Zresetuj hasło </button>

    </form>
</div>
@endsection
