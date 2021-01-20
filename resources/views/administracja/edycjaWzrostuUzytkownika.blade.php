@extends('layouts.panel')

@section('content')
<div class="dodajDaneKontener"> 
<form id="wzrostForm" method="POST" action="{{ route('edytujWzrostUzytkownikaPost', $wzrostID) }}">
    <span class="tytul"> Edytuj wzrost</span>
        <input  type="hidden" name="_token" value="{{csrf_token()}}" />
        <input class="dodajDane" data-opis="Wzrost" name="wzrost" placeholder="Wpisz wzrost" type="number" value="{{$wzrost->wzrost}}" step=".01"/>
        <div class="openConfirm">Edytuj wzrost</div>
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