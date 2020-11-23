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

    <form id="dodajPomiarTable" method="POST" action="{{ route('dodajPomiary') }}" class="uzupelnijDaneFormularz">
    
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <input data-opis="Skurczowe" name="skurczowe" placeholder="Podaj cisnienie skurczowe" type="text" />
        <input data-opis="Rozkurczowe" name="rozkurczowe" placeholder="Podaj cisnienie rozkurczowe" type="text" />
        <input data-opis="Tętno" name="tetno" placeholder="Podaj tętno" type="text" />
        <div class="openConfirm">Dodaj pomiar</div>
    </form>

    <div class="tablica">
        <div class="wiersz"> skurczowe </div>
        <div class="wiersz"> rozkurczowe </div>
        <div class="wiersz"> tetno </div>
        @foreach($pomiary as $pomiar)
        <div class="wiersz"> {{ $pomiar->skurczowe }} </div>
        <div class="wiersz"> {{ $pomiar->rozkurczowe }}</div>
        <div class="wiersz"> {{ $pomiar->tetno }} </div>
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