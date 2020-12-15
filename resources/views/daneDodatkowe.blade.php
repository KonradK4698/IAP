@extends('layouts.panel')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form id="wzrostForm" method="POST" action="{{ route('dodajWzrostPost') }}" class="uzupelnijDaneFormularz">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <input data-opis="Wzrost" name="wzrost" placeholder="Wpisz wzrost" type="number" step=".01"/>
        <div class="openConfirm">Dodaj wzrost</div>
    </form>

    <div class="tablica">
        <div class="wiersz2"> data </div>
        <div class="wiersz2"> wzrost </div>
        @foreach($wzrosty as $wzrost)
        <div class="wiersz2"> {{ $wzrost->created_at}} </div>
        <div class="wiersz2"> {{ $wzrost->wzrost }}</div>
        @endforeach
    </div>

    <form id="wagaForm" method="POST" action="{{ route('dodajWage') }}" class="uzupelnijDaneFormularz">
    
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <input data-opis="Waga" name='waga' placeholder="Wpisz wagę" type="number" step=".01" />
        <div class="openConfirm">Dodaj wagę</div>
    </form>
    
    <div class="tablica">
        <div class="wiersz2"> data </div>
        <div class="wiersz2"> waga </div>
        @foreach($wagi as $waga)
        <div class="wiersz2"> {{ $waga->created_at}} </div>
        <div class="wiersz2"> {{ $waga->waga }}</div>
        @endforeach
    </div>

    <form id="obwodyTable" method="POST" action="{{ route('dodajObwody') }}" class="uzupelnijDaneFormularz">
    
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <input data-opis="Biceps" name='biceps' placeholder="Wymiar bicepsu" type="number" step=".1" />
        <input data-opis="Klatka piersiowa" name='klataPiersiowa' placeholder="Wymiar klatki piersiowej" type="number" step=".1" />
        <input data-opis="Talia" name='talia' placeholder="Wymiar talii" type="number" step=".1" />
        <input data-opis="Pas" name='pas' placeholder="Wymar pasa" type="number" step=".1" />
        <input data-opis="Biodra" name='biodra' placeholder="Wymiar bioder" type="number" step=".1" />
        <input data-opis="Uda" name='uda' placeholder="Wymiar uda" type="number" step=".1" />
        <input data-opis="Łydka" name='lydka' placeholder="Wymiar łydki" type="number" step=".1" />
        <div class="openConfirm">Dodaj obwody</div>
    </form>

    <div class="tablica">
        <div class="wiersz3"> data </div>
        <div class="wiersz3"> biceps </div>
        <div class="wiersz3"> klatka</div>
        <div class="wiersz3"> talia </div>
        <div class="wiersz3"> pas </div>
        <div class="wiersz3"> biodra </div>
        <div class="wiersz3"> uda </div>
        <div class="wiersz3"> lydka </div>
        @foreach($obwody as $obwod)
        <div class="wiersz3"> {{ $obwod->updated_at}} </div>
        <div class="wiersz3"> {{ $obwod->biceps }}</div>
        <div class="wiersz3"> {{ $obwod->klataPiersiowa }}</div>
        <div class="wiersz3"> {{ $obwod->talia }}</div>
        <div class="wiersz3"> {{ $obwod->pas }}</div>
        <div class="wiersz3"> {{ $obwod->biodra }}</div>
        <div class="wiersz3"> {{ $obwod->uda }}</div>
        <div class="wiersz3"> {{ $obwod->lydka }}</div>
        @endforeach
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