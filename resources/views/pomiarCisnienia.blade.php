@extends('layouts.panel')

@section('content')
    <span class="tytul"> Pomiar ciśnienia </span>
    <form id="dodajPomiarTable" method="POST" action="{{ route('dodajPomiary') }}" class="uzupelnijDaneFormularz">
        <span class="tytul"> Dane ciśnienia</span>
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <span class="opisPozycji"> Wartość ciśnienia skurczowego </span>
        <input data-opis="Skurczowe" class="dodajDane" name="skurczowe" placeholder="Podaj cisnienie skurczowe" type="text" />
        <span class="opisPozycji"> Wartość ciśnienia rozkurczowego </span>
        <input data-opis="Rozkurczowe" class="dodajDane" name="rozkurczowe" placeholder="Podaj cisnienie rozkurczowe" type="text" />
        <span class="opisPozycji"> Wartość tętna </span>
        <input data-opis="Tętno" class="dodajDane" name="tetno" placeholder="Podaj tętno" type="text" />
        <div class="openConfirm">Dodaj pomiar</div>
    </form>
    @if($pomiary->count() > 0)

    
    
    
    <div class="tablica">
        <span class="tytul"> Wartości ciśnienia w dniu {{now()->format('d-m-Y')}}</span>
        <div class="naglowek"> Godzina </div>
        <div class="naglowek"> Skurczowe </div>
        <div class="naglowek"> Rozkurczowe </div>
        <div class="naglowek"> Tętno </div>
        @foreach($pomiary as $pomiar)
        <div class="wiersz"> {{ date('H:i:s', strtotime($pomiar->created_at)) }} </div>
        <div class="wiersz"> {{ $pomiar->skurczowe }} </div>
        <div class="wiersz"> {{ $pomiar->rozkurczowe }}</div>
        <div class="wiersz"> {{ $pomiar->tetno }} </div>
        @endforeach
    </div>
    @else
    <span class="brakPomiarow"> Brak pomiarów ciśnienia w dniu dzisiejszym. <span>
    
     @endif
@endsection

<div class="overlay"></div>
<div class="confirmPopupBox">
    <div class="popupInformacjeBox">
        <span class="sprawdzDane"> Sprawdź poprawnośc danych! <br/> <span class="alertText"> Pamiętaj nie będzie można ich zmienić!</span></span>
    </div>
    <button class="potwierdzDane" type="submit"> Tak </button>
    <button class="zmienDane"> Nie </button>
</div>