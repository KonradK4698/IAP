@extends('layouts.panel')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form method="POST" action="{{ action('DaneUzytkownikaController@store') }}" class="uzupelnijDaneFormularz">
    
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <input name="imie" placeholder="Imie" type="text" />
        <input name='nazwisko' placeholder="Nazwisko" type="text" />
        <input name='dataUrodzenia' placeholder="Data urodzenia" type="date" />
        <input name='telefon' placeholder="Numer telefonu" type="phone" />
        <input name='telefonPom' placeholder="Pomocniczny telefon" type="phone" />
        <input type="checkbox" id="horns" name="polityka"> Polityka prywatności potwierdź.
        <div class="uzupelnijDanePrzycisk">
            <button type="submit">Prześlij dane</button>
        </div>
    </form>

    <div class="kontenerInformacji"> 
        @foreach($daneUzytkownika as $dana)
        <span> {{ $dana->imie }} </span>
        <span> {{ $dana->nazwisko }} </span>
        <span> {{ $dana->dataUrodzenia }} </span>
        <span> {{ $dana->telefon }} </span>
        <span> {{ $dana->telefonPomocniczy }} </span>
        @endforeach
    </div>

@endsection