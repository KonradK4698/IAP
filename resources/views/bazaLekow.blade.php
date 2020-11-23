@extends('layouts.panel')

@section('content')

<div class="tablica">
        <div class="wiersz4"> nazwa </div>
        <div class="wiersz4"> dawkowanie </div>
        <div class="wiersz4"> ilosc </div>
        <div class="wiersz4"> cena </div>
        <div class="wiersz4"> opis </div>
        @foreach($leki as $lek)
        <div class="wiersz4"> {{ $lek->nazwa}} </div>
        <div class="wiersz4"> {{ $lek->zalecaneDawkowanie }}</div>
        <div class="wiersz4"> {{ $lek->ilosc}} </div>
        <div class="wiersz4"> {{ $lek->cena }}</div>
        <div class="wiersz4"> {{ $lek->opis }}</div>
        @endforeach
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form id="dodajLekTable" method="POST" action="{{ route('dodajLek') }}" class="uzupelnijDaneFormularz">
    
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <input data-opis="Nazwa leku" name="nazwa" placeholder="Podaj nazwe" type="text" />
        <input data-opis="Zalecane dawkowanie"name="zalecaneDawkowanie" placeholder="Podaj zalecaneDawkowanie" type="text" />
        <input data-opis="Ilość w opakowaniu" name="ilosc" placeholder="Podaj ilosc w opakowaniu" type="text" />
        <input data-opis="Cena za opakowanie" name="cena" placeholder="Podaj cene" type="text" />
        <input data-opis="Opis produktu" name="opis" placeholder="Podaj opis" type="text" />
        <div class="openConfirm">Dodaj lek do bazy</div>
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