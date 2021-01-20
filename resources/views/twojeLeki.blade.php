@extends('layouts.panel')

@section('content')


    <form id="dodajTwojeLeki" method="POST" action="{{ route('dodajLekUzytkownika') }}" class="uzupelnijDaneFormularz">
        <span class="tytul"> Dodaj lek </span>
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <span class="opisPozycji"> Wybierz lek: </span>
        <select id="wybierzLekSelect" data-opis="Nazwa leku:" class="form-control" name="idLeku" >
            @foreach($wybierzLek as $lek)
            <option value="{{ $lek->id }}">{{ $lek->nazwa }}</option>
            @endforeach
        </select>
        <span class="opisPozycji"> Podaj ilość posiadanych opakowań </span>
        <input data-opis="Ilość opakowań:" class="dodajDane" name="iloscPaczek" placeholder="Podaj ilość opakowań" type="text" />
        <span class="opisPozycji"> Podaj ilość leku, którą musisz przyjąć w ciagu dnia: </span>
        <input data-opis="Dzienna ilość:" class="dodajDane" name="dawkowanie" placeholder="Wprowadź liczbę" type="text" />
        <span class="opisPozycji"> Podaj (w godzinach) odstęp czasowy pomiędzy dawkami leku: </span>
        <input data-opis="Odstęp czasowy:" class="dodajDane" name="czestotliwosc" placeholder="Wprowadź liczbę " type="text" />
        <span class=" opisPozycji"> Podaj godzinę rozpoczęcia przyjmowania leku: </span>
        <input data-opis="Godzina rozpoczęcia:" class="dodajDane" name="rozpocznij" placeholder="Podaj godzine rozpoczęcia przyjmowania leku" type="time" />
        <span class="opisPozycji"> Podaj datę rozpoczęcia przyjmowania leku: </span>
        <input data-opis="Data rozpoczęcia:" class="dodajDane" name="rozpocznijData" placeholder="Podaj date rozpoczęcia przyjmowania leku" type="date" />
        <div class="openConfirm">Dodaj lek</div>
    </form>

<div class="kontenerDanych">
@if($lekiUzytkownika->count() > 0)
<span class="tytul"> Dodane leki</span>
@foreach($lekiUzytkownika as $lek)
<div class="doPrzyjeciaKontener">
    <img src="{{ asset('img/icons/lek.png') }}" >
    <span class="nazwaLeku">Nazwa: {{$lek->nazwa}} </span>
    <span class="nazwaLeku">Ilość tabletek: {{$lek->iloscLeku}} </span>
    <span class="nazwaLeku">Ilość opakowań: {{$lek->iloscPaczek}} </span>
    <span class="nazwaLeku">Data zakończenia: {{$lek->zakoncz}} </span>

    <span class="godzinaLeku">  </span>
    <form method="POST" action="{{ route('dodajOpakowanie', [$lek->id, $lek->idLeku] )}}" class="deleteForm">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <span class="godzinaLeku"> Dodaj nowe opakowania leku: </span>
            <input class="dodajDane2" placeholder="Podaj ilosc opakowań" name="ilosc" type="number" />
            <div class="uzupelnijDanePrzycisk">
            <button type="submit" class="deleteButton blueButton small">Dodaj opakowanie</button>
            </div>
        </form>
        <form method="POST" action="{{ route('dodajLekiNaSztuki', [$lek->id, $lek->idLeku] )}}" class="deleteForm">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <span class="godzinaLeku"> Dodaj dodatkową ilość sztuk leku: </span>
            <input class="dodajDane2" placeholder="Podaj ilosc sztuk"  name="iloscSztuk" type="number" />
            <div class="uzupelnijDanePrzycisk">
            <button type="submit" class="deleteButton blueButton small">Dodaj sztuki</button>
            </div>
        </form>
</div>
@endforeach
@else
<span class="tytul">Brak dodanych leków</span>
@endif
</div>

    
@endsection

<div class="overlay"></div>
<div class="confirmPopupBox">
    <div class="popupInformacjeBox">
        <span class="sprawdzDane"> Sprawdź poprawnośc danych! <br/> <span class="alertText"> Pamiętaj nie będzie można ich zmienić!</span></span>
    </div>
    <button class="potwierdzDane" type="submit"> Tak </button>
    <button class="zmienDane"> Nie </button>
</div>