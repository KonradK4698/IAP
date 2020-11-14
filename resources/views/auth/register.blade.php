@extends('layouts.app')

@section('content')
<div class="kontenerRejestracja">
    </div>
    <form class="formularzRejestracyjny" method="POST" action="{{ route('register') }}">
        @csrf
        <span class="naglowekRejestracja"> Rejestracja </span>
        <div>
            <input class="inputRejestracja" type="email" placeholder="Podaj email" name="email"
                value="{{ old('email') }}" required autocomplete="email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <input class="inputRejestracja" type="password" placeholder="Podaj hasło" name="password" required
                autocomplete="new-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <input class="inputRejestracja" type="password" placeholder="Powtórz hasło" name="password_confirmation" required autocomplete="new-password">

            <button type="submit"> Zarejestruj </button>
        </div>
    </form>
@endsection
