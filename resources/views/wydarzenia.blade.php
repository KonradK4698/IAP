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

    <form id="dodajPomiarTable" method="POST" action="{{ route('dodajWydarzenie') }}" class="uzupelnijDaneFormularz">
    
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <input data-opis="Tytuł" name="tytul" placeholder="Wpisz krótki tytuł" type="text" />
        <input data-opis="Data" name="data" placeholder="Data wydarzenia" type="date" />
        <input data-opis="Godzina" name="godzina" placeholder="Godzina wydarzenia" type="time" />
        <input data-opis="Opis" name="opis" placeholder="Opis wydarzenia" type="text" />
        <div class="openConfirm">Dodaj wydarzenie</div>
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