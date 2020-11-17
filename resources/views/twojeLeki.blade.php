@extends('layouts.panel')

@section('content')
    <form method="POST" action="{{ route('dodajLekUzytkownika') }}" class="uzupelnijDaneFormularz">
    
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <input name="idLeku" placeholder="Podaj id" type="text" />
        <input name="iloscPaczek" placeholder="Podaj iloscPaczek" type="text" />
        <input name="iloscLeku" placeholder="Podaj iloscLeku" type="text" />
        <input name="dawkowanie" placeholder="Podaj dawkowanie" type="text" />
        <div class="uzupelnijDanePrzycisk">
            <button type="submit">Prześlij dane</button>
        </div>
    </form>
@endsection