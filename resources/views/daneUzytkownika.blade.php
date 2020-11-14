@extends('layouts.panel')

@section('content')
    <form method="POST" action="{{ action('DaneUzytkownikaController@store') }}" class="uzupelnijDaneFormularz">
    
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <input name="imie" placeholder="Imie" type="text" />
        <input name='nazwisko' placeholder="Nazwisko" type="text" />
        <input name='dataUrodzenia' placeholder="Data urodzenia" type="date" />
        <input name='telefon' placeholder="Numer telefonu" type="phone" />
        <input name='telefonPom' placeholder="Pomocniczny telefon" type="phone" />
        <div class="uzupelnijDanePrzycisk">
            <button type="submit">Prześlij dane</button>
        </div>
    </form>
@endsection