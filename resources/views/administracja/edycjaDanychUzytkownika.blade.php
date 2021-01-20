@extends('layouts.panel')

@section('content')

<form id="daneOsobowe" method="POST" action="{{ route('edytujDaneUzytkownikaPost', $daneID) }}" class="uzupelnijDaneFormularz">
    <span class="tytul"> Dane osobowe</span>
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
    <span class="opisPozycji"> Podaj imie </span>
    <input data-opis="Imię" class="dodajDane" name="imie" value="{{ $dane->imie }}" placeholder="Imię" type="text" />
    <span class="opisPozycji"> Podaj Nazwisko </span>
    <input data-opis="Nazwisko" class="dodajDane" name='nazwisko' value="{{ $dane->nazwisko }}" placeholder="Nazwisko" type="text" />
    <span class="opisPozycji"> Podaj datę urodzenia </span>
    <input data-opis="Data urodzenia" class="dodajDane" name='dataUrodzenia' value="{{ $dane->dataUrodzenia }}" placeholder="Data urodzenia" type="date" />
    <span class="opisPozycji"> Podaj twój numer telefonu </span>
    <input data-opis="Numer osobisty" class="dodajDane" name='telefon' value="{{ $dane->telefon }}" placeholder="Numer prywatny" type="phone" />
    <span class="opisPozycji"> Podaj numer telefonu osoby zaufanej </span>
    <input data-opis="Numer zaufany" class="dodajDane" name='telefonPom' value="{{ $dane->telefonPomocniczy }}" placeholder="Numer zaufany" type="phone" />
    <div class="openConfirm">Dodaj dane</div>
    </form>

@endsection
<div class="overlay"></div>
<div class="confirmPopupBox">
    <div class="popupInformacjeBox">
        <span class="sprawdzDane"> Sprawdź poprawnośc danych! <br/> <span class="alertText"> Pamiętaj nie będzie można ich zmienić!</span></span>
    </div>
    <button class="potwierdzDane" type="submit"> Tak </button>
    <button class="zmienDane"> Nie </button>
</div>