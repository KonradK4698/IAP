@extends('layouts.panel')

@section('content')
<div class="dodajDaneKontener"> 
<form id="wagaForm" method="POST" action="{{ route('edytujWageUzytkownikaPost', $wagaID) }}">
        <span class="tytul"> Edytuj wagę</span>
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <input class="dodajDane" data-opis="Waga" name='waga' placeholder="Wpisz wagę" type="number" value="{{$waga->waga}}" step=".01" />
        <div class="openConfirm">Edytuj wagę</div>
    </form>
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