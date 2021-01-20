@extends('layouts.panel')

@section('content')
<div class="homeKontener">
    @if($imieUzytkownika->count() > 0)
    <span> Witaj {{ $imieUzytkownika->first()->imie }} </span>
    @else
    <span> Witaj użytkowniku </span>
    @endif
</div>

<div class="kontenerDanych">
@if($harmonogramLekow->count() > 0)
<span class="tytul"> Leki na dziś</span>
@foreach($harmonogramLekow as $lek)
<div class="doPrzyjeciaKontener">
    <img src="{{ asset('img/icons/lek.png') }}" >
    <span class="nazwaLeku">Nazwa: {{$lek->nazwa}} </span>
    <span class="godzinaLeku">Godzina: {{$lek->godzina}} </span>
    @if($lek->godzina <= now()->format('H:i:s'))
    
    <form method="post" action="{{route('przyjmijLek', $lek->id)}}"> 
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <button type="submit"  class="deleteButton blueButton">Potwierdź przyjęcie leku</button>
    </form> 
    @endif
</div>
@endforeach
@else
<span class="tytul"> Brak leków </span>
@endif
</div>

<div class="daneUzytkownika">
@if($najblizszeWydarzenia->count() > 0)
<span class="tytul"> Wydarzenia w tym tygodniu</span>
@foreach($najblizszeWydarzenia as $wydarzenie)
<div class="informacjeUzytkownika wydarzeniaKontener">
    <img src="{{ asset('img/icons/wydarzenie.png') }}" >
    <span class="tytulInformacji">{{$wydarzenie->tytul}} </span>
    <span class="daneWydarzenia">{{$wydarzenie->data}} {{$wydarzenie->godzina}}  </span>
    <span class="opisWydarzenia">{{$wydarzenie->opis}}  </span>
</div>
@endforeach
@else
<span class="tytul"> Brak wydarzeń w tym tygodniu</span>
@endif
</div>

<div class="daneUzytkownika">
    <span class="tytul"> Waga i wzrost</span>
    <div class="informacjeUzytkownika">
        <img src="{{ asset('img/icons/waga.png') }}" >
        <span class="tytulInformacji"> Aktualna waga </span>
        <span class="daneInformacji"> {{is_null($aktualnaWaga) == true ? "Brak danych" : $aktualnaWaga->waga.' kg'}}  </span>
    </div>
    <div class="informacjeUzytkownika">
        <img src="{{ asset('img/icons/wzrost.png') }}" >
        <span class="tytulInformacji"> Aktualny wzrost </span>
        <span class="daneInformacji"> {{is_null($aktualnyWzrost) == true ? "Brak danych" : $aktualnyWzrost->wzrost.' cm'}} </span>
    </div>
</div>

<div class="daneUzytkownika">

    <span class="tytul"> Aktualne obwody </span>
    @if(is_null($aktualneObwody) == false)
    <div class="informacjeUzytkownika">
        <img src="{{ asset('img/icons/biceps.png') }}" >
        <span class="tytulInformacji"> Wymiar bicepsu </span>
        <span class="daneInformacji"> {{$aktualneObwody->biceps}} cm </span>
    </div>
    <div class="informacjeUzytkownika">
        <img src="{{ asset('img/icons/klatka.png') }}" >
        <span class="tytulInformacji"> Wymiar klatki </span>
        <span class="daneInformacji"> {{$aktualneObwody->klataPiersiowa}} cm </span>
    </div>
    <div class="informacjeUzytkownika">
        <img src="{{ asset('img/icons/talia.png') }}" >
        <span class="tytulInformacji"> Wymiar tali </span>
        <span class="daneInformacji"> {{$aktualneObwody->talia}} cm </span>
    </div>
    <div class="informacjeUzytkownika">
        <img src="{{ asset('img/icons/pas.png') }}" >
        <span class="tytulInformacji"> Wymiar pasa </span>
        <span class="daneInformacji"> {{$aktualneObwody->pas}} cm </span>
    </div>
    <div class="informacjeUzytkownika">
        <img src="{{ asset('img/icons/biodra.png') }}" >
        <span class="tytulInformacji"> Wymiar bioder </span>
        <span class="daneInformacji"> {{$aktualneObwody->biodra}} cm </span>
    </div>
    <div class="informacjeUzytkownika">
        <img src="{{ asset('img/icons/uda.png') }}" >
        <span class="tytulInformacji"> Wymiar uda </span>
        <span class="daneInformacji"> {{$aktualneObwody->uda}} cm </span>
    </div>
    <div class="informacjeUzytkownika">
        <img src="{{ asset('img/icons/lydka.png') }}" >
        <span class="tytulInformacji"> Wymiar łydki </span>
        <span class="daneInformacji"> {{$aktualneObwody->lydka}} cm </span>
    </div>
    @else
    <span class="tytul"> Brak wprowadzonych informacji o obwodach </span>
    @endif
</div>


<div class="kontenerDanych">
@if($daneCisnienia->count() > 0)
<span class="tytul"> Dane ciśnienia w ostatnim tygodniu</span>
<div id="chartdiv"></div>
@else
<span class="tytul"> Brak wprowadzonych pomiarów ciśnienia</span>
@endif
@if($statyskaLekow->count() > 0)
<span class="tytul"> Ilość pozostałych leków</span>
<div id="chartdiv2"></div>
@else
<span class="tytul"> Brak wprowadzonych leków</span>
@endif
</div>
    @endsection
@section('statystykaCisnienie')
    @foreach($daneCisnienia as $dana)
        {"czasDodania" : "{{$dana->created_at}}","skurczowe" : {{$dana->skurczowe}},"rozkurczowe" : {{$dana->rozkurczowe}},"tetno" : {{$dana->tetno}}},
    @endforeach
@endSection 
@section('statystykaLeki')
    @foreach($statyskaLekow as $lek)
        {"nazwa" : "{{$lek->nazwa}}","ilosc" : {{$lek->iloscLeku}} },
    @endforeach
@endSection 

    
