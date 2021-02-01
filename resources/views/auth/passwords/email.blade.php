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

@if (session('status'))
    <div class="errorContener succesContener" role="alert">
    <span class="closeError"> X </span>
    <span>{{ session('status') }}</span>
    </div>
@endif
                    

                    <form method="POST" action="{{ route('password.email') }}" class="uzupelnijDaneFormularz formularzReset">
                        @csrf
                        <span class="tytul"> Resetowanie hasła </span>
                        <span class="opisPozycji"> Wpisz adres e-mail </span>

                                <input id="email" type="email" class="dodajDane" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Wprowadź adres e-mail">



                                <button type="submit" class="przyciskEmail">
                                    Wyślij link resetujący hasło
                                </button>

                        </div>
                    </form>

</div>
@endsection
