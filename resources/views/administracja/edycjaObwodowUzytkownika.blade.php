@extends('layouts.panel')

@section('content')
<div class="dodajDaneKontener"> 
    <form id="obwodyTable" method="POST" action="{{ route('edytujObwodyUzytkownikaPost', $obwodyID) }}">
        <span class="tytul"> Edytuj obwody</span>
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <span class="opisPozycji"> Wymiar bicepsu </span>
        <input class="dodajDane" data-opis="Biceps" name='biceps' placeholder="Wymiar bicepsu" type="number" value="{{$obwody->biceps}}" step=".1" />
        <span class="opisPozycji"> Wymiar klatki piersiowej </span>
        <input class="dodajDane" data-opis="Klatka piersiowa" name='klataPiersiowa' placeholder="Wymiar klatki piersiowej" type="number" value="{{$obwody->klataPiersiowa}}" step=".1" />
        <span class="opisPozycji"> Wymiar talii </span>
        <input class="dodajDane" data-opis="Talia" name='talia' placeholder="Wymiar talii" type="number" value="{{$obwody->talia}}" step=".1" />
        <span class="opisPozycji"> Wymiar pasa </span>
        <input class="dodajDane" data-opis="Pas" name='pas' placeholder="Wymar pasa" type="number" value="{{$obwody->pas}}" step=".1" />
        <span class="opisPozycji"> Wymiar bioder </span>
        <input class="dodajDane" data-opis="Biodra" name='biodra' placeholder="Wymiar bioder" type="number" value="{{$obwody->biodra}}" step=".1" />
        <span class="opisPozycji"> Wymiar uda </span>
        <input class="dodajDane" data-opis="Uda" name='uda' placeholder="Wymiar uda" type="number" value="{{$obwody->uda}}" step=".1" />
        <span class="opisPozycji"> Wymiar łydki </span>
        <input class="dodajDane" data-opis="Łydka" name='lydka' placeholder="Wymiar łydki" type="number" value="{{$obwody->lydka}}" step=".1" />
        <div class="openConfirm">Edytuj obwody</div>
    </form>
</div>
@endsection
<div class="overlay"></div>
<div class="confirmPopupBox">
    <div class="popupInformacjeBox">
        <span class="sprawdzDane"> Sprawdź poprawność danych! <br/> <span class="alertText"> Pamiętaj nie będzie można ich zmienić!</span></span>
    </div>
    <button class="potwierdzDane" type="submit"> Tak </button>
    <button class="zmienDane"> Nie </button>
</div>