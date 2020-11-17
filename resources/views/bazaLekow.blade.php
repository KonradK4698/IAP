@extends('layouts.panel')

@section('content')
    <form method="POST" action="{{ route('dodajLek') }}" class="uzupelnijDaneFormularz">
    
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <input name="nazwa" placeholder="Podaj nazwe" type="text" />
        <input name="zalecaneDawkowanie" placeholder="Podaj zalecaneDawkowanie" type="text" />
        <input name="ilosc" placeholder="Podaj ilosc w opakowaniu" type="text" />
        <input name="cena" placeholder="Podaj cene" type="text" />
        <input name="opis" placeholder="Podaj opis" type="text" />
        <div class="uzupelnijDanePrzycisk">
            <button type="submit">Prześlij dane</button>
        </div>
    </form>
@endsection