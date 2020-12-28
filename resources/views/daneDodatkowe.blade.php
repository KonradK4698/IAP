@extends('layouts.panel')

@section('content')
<span class="tytul"> Dane dodatkowe użytkownika</span>
<div class="dodajDaneKontener">

    <form id="wzrostForm" method="POST" action="{{ route('dodajWzrostPost') }}">
    <span class="tytul"> Dodaj wzrost</span>
        <input  type="hidden" name="_token" value="{{csrf_token()}}" />
        <input class="dodajDane" data-opis="Wzrost" name="wzrost" placeholder="Wpisz wzrost" type="number" step=".01"/>
        <div class="openConfirm">Dodaj wzrost</div>
    </form>

    <div class="dodaneDaneKontener">
        <span class="tytul"> Ostatnio dodany wzrost</span>
        <span class="dodaneDane"> Data: <span>{{ $wzrost->created_at }}</span></span>
        <span class="dodaneDane"> Wzrost: <span>{{ $wzrost->wzrost }}</span></span>
    </div>
</div>   
<div class="dodajDaneKontener"> 
    <form id="wagaForm" method="POST" action="{{ route('dodajWage') }}">
        <span class="tytul"> Dodaj wagę</span>
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <input class="dodajDane" data-opis="Waga" name='waga' placeholder="Wpisz wagę" type="number" step=".01" />
        <div class="openConfirm">Dodaj wagę</div>
    </form>
    
    <div class="dodaneDaneKontener">
        <span class="tytul"> Ostatnio dodana waga</span>
        <span class="dodaneDane"> Data: <span>{{ $waga->created_at }}</span></span>
        <span class="dodaneDane"> Waga: <span>{{ $waga->waga }}</span></span>
    </div>
</div> 
<div class="dodajDaneKontener"> 
    <form id="obwodyTable" method="POST" action="{{ route('dodajObwody') }}">
        <span class="tytul"> Dodaj obwody</span>
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <input class="dodajDane" data-opis="Biceps" name='biceps' placeholder="Wymiar bicepsu" type="number" step=".1" />
        <input class="dodajDane" data-opis="Klatka piersiowa" name='klataPiersiowa' placeholder="Wymiar klatki piersiowej" type="number" step=".1" />
        <input class="dodajDane" data-opis="Talia" name='talia' placeholder="Wymiar talii" type="number" step=".1" />
        <input class="dodajDane" data-opis="Pas" name='pas' placeholder="Wymar pasa" type="number" step=".1" />
        <input class="dodajDane" data-opis="Biodra" name='biodra' placeholder="Wymiar bioder" type="number" step=".1" />
        <input class="dodajDane" data-opis="Uda" name='uda' placeholder="Wymiar uda" type="number" step=".1" />
        <input class="dodajDane" data-opis="Łydka" name='lydka' placeholder="Wymiar łydki" type="number" step=".1" />
        <div class="openConfirm">Dodaj obwody</div>
    </form>
    <div class="dodaneDaneKontener">
        <span class="tytul"> Ostatnio dodane obwody</span>
        <span class="dodaneDane"> Data: <span>{{ $obwody->created_at }}</span></span>
        <span class="dodaneDane"> Biceps: <span>{{ $obwody->biceps }}</span></span>
        <span class="dodaneDane"> Klatka piersiowa: <span>{{ $obwody->klataPiersiowa}}</span></span>
        <span class="dodaneDane"> Talia: <span>{{ $obwody->talia }}</span></span>
        <span class="dodaneDane"> Pas: <span>{{ $obwody->pas }}</span></span>
        <span class="dodaneDane"> Biodra: <span>{{ $obwody->biodra }}</span></span>
        <span class="dodaneDane"> Uda: <span>{{ $obwody->uda }}</span></span>
        <span class="dodaneDane"> Łydka: <span>{{ $obwody->lydka }}</span></span>
    </div>

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