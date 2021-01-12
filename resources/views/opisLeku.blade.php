@extends('layouts.panel')

@section('content')

<div class="lekKontener">
    <div class="kontenerOpisu">
        <img class="fotoWielkosc " src="{{ asset('img/icons/lek2.png') }}" /> 
        <span class="nazwa"> {{ $lek->nazwa }} </span>
    </div>
    <div class="kontenerOpisu wielkosc2">
        <img class="fotoWielkosc2 " src="{{ asset('img/icons/dawka.png') }}" /> 
        <span> Zalecane dawkowanie: </span>
        <span> {{ $lek->zalecaneDawkowanie }} </span>
    </div>
    <div class="kontenerOpisu wielkosc2">
        <img class="fotoWielkosc2 "  src="{{ asset('img/icons/iloscLeku.png') }}" /> 
        <span>Ilość w opakowaniu:  </span>
        <span> {{ $lek->ilosc }} </span>
    </div>
    <div class="kontenerOpisu wielkosc2">
        <img class="fotoWielkosc2"  src="{{ asset('img/icons/cenaLeku.png') }}" /> 
        <span>Cena:  </span>
        <span> {{ $lek->cena }} zł</span>
    </div>
    <div class="kontenerOpisu">
        <span class="tytul"> Opis leku </span>
        <span class="opis"> {{ $lek->opis }} </span>
    </div>
</div>

@endsection