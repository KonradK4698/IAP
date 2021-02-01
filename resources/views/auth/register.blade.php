@extends('layouts.app')

@section('content')

<div class="kontenerRejestracja"></div>

@if ($errors->any())
<div class="errorContener">
    <span class="closeError"> X </span>
    <p>Wystąpiły błędy!!!</p>
    @foreach ($errors->all() as $error)
        <span>{{ $error }}</span>
    @endforeach
</div>
@endif

    <form class="formularzRejestracyjny" method="POST" action="{{ route('register') }}">
        @csrf
        <span class="naglowekRejestracja"> Rejestracja </span>
        <div>
            <input class="inputRejestracja" type="email" placeholder="Podaj email" name="email"
                value="{{ old('email') }}"  autocomplete="email">

            <input class="inputRejestracja" type="password" placeholder="Podaj hasło" name="password" required
                autocomplete="new-password">
            
            <input class="inputRejestracja" type="password" placeholder="Powtórz hasło" name="password_confirmation" required autocomplete="new-password">

            <button type="submit"> Zarejestruj </button>
        </div>
    </form>
@endsection
