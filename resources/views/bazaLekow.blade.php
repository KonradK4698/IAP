@extends('layouts.panel')

@section('content')

<div class="tablica">
        <div class="wiersz4"> nazwa </div>
        <div class="wiersz4"> dawkowanie </div>
        <div class="wiersz4"> ilosc </div>
        <div class="wiersz4"> cena </div>
        <div class="wiersz4"> opis </div>
        @foreach($leki as $lek)
        <div class="wiersz4"> {{ $lek->nazwa}} </div>
        <div class="wiersz4"> {{ $lek->zalecaneDawkowanie }}</div>
        <div class="wiersz4"> {{ $lek->ilosc}} </div>
        <div class="wiersz4"> {{ $lek->cena }}</div>
        <div class="wiersz4"> {{ $lek->opis }}</div>
        @endforeach
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

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