@extends('layouts.panel')

@section('content')

@if(count($daneUzytkownika) > 0)
<div class="kontenerInformacji"> 
<span class="tytul"> Twoje dane</span>
        @foreach($daneUzytkownika as $dana)
        
        <div class="daneOsobowe"> 
            <img src="{{ asset('img/icons/imieNazwisko.png') }}" >
            <span>Imię i Nazwisko</span> 
            <span class="bigFirstLetter">{{ $dana->imie}} {{ $dana->nazwisko }}</span>
        </div>
        <div class="daneOsobowe"> 
            <img src="{{ asset('img/icons/urodziny.png') }}" >
            <span> Data urodzenia: </span>
            <span> {{ $dana->dataUrodzenia }} </span>
        </div>
        <div class="daneOsobowe"> 
            <img src="{{ asset('img/icons/telefon.png') }}" >
            <span> Numer telefonu: </span>
            <span> {{ $dana->telefon }} </span>
        </div>
        <div class="daneOsobowe"> 
            <img src="{{ asset('img/icons/telefon2.png') }}" >
            <span> Telefon zaufany: </span>
            <span> {{ $dana->telefonPomocniczy }} </span>
        </div>
        
        @endforeach
</div>
@else
    <form id="daneOsobowe" method="POST" action="{{ action('DaneUzytkownikaController@store') }}" class="uzupelnijDaneFormularz">
    <span class="tytul"> Dane osobowe</span>
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
    <span class="opisPozycji"> Podaj imie </span>
    <input data-opis="Imię" class="dodajDane" name="imie" value="{{ old('imie') }}" placeholder="Imię" type="text" />
    <span class="opisPozycji"> Podaj nazwisko </span>
    <input data-opis="Nazwisko" class="dodajDane" name='nazwisko' value="{{ old('nazwisko') }}" placeholder="Nazwisko" type="text" />
    <span class="opisPozycji"> Podaj datę urodzenia </span>
    <input data-opis="Data urodzenia" class="dodajDane" name='dataUrodzenia' value="{{ old('dataUrodzenia') }}" placeholder="Data urodzenia" type="date" />
    <span class="opisPozycji"> Podaj twój numer telefonu </span>
    <input data-opis="Numer osobisty" class="dodajDane" name='telefon' value="{{ old('telefon') }}" placeholder="Numer prywatny" type="phone" />
    <span class="opisPozycji"> Podaj numer telefonu osoby zaufanej </span>
    <input data-opis="Numer zaufany" class="dodajDane" name='telefonPom' value="{{ old('telefonPom') }}" placeholder="Numer zaufany" type="phone" />
    <div class="pozycjaChecbox">
    <input data-opis="Polityka prywatności" class="checkbox" type="checkbox" name="polityka" >
    <span class="politykaOpis"> Potwierdź politykę prywatności. <a class="politykaLink" href="{{route('polityka')}}"> Link </a> </span>
    </div>
    <div class="openConfirm">Dodaj dane</div>
    </form>
@endif


@endsection
<div class="overlay"></div>
<div class="confirmPopupBox">
    <div class="popupInformacjeBox">
        <span class="sprawdzDane"> Sprawdź poprawność danych! <br/> <span class="alertText"> Pamiętaj nie będzie można ich zmienić!</span></span>
    </div>
    
    <button class="potwierdzDane" type="submit"> Potwierdź </button>
    <button class="zmienDane"> Wróć </button>
</div>