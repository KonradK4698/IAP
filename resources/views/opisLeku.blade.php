@extends('layouts.panel')

@section('content')

<div class="lekKontener">
    <div class="kontenerOpisu">
        <img class="fotoWielkosc " src="{{ asset('img/icons/lek2.png') }}" /> 
        <span class="nazwa"> {{ $lek->nazwa }} </span>
    </div>
    <div class="kontenerOpisu wielkosc2">
        <img class="fotoWielkosc2 " src="{{ asset('img/icons/dawka.png') }}" /> 
        <span> Zalecana dzienna dawka: </span>
        <span> {{ $lek->zalecaneDawkowanie }} </span>
    </div>
    <div class="kontenerOpisu wielkosc2">
        <img class="fotoWielkosc2 "  src="{{ asset('img/icons/iloscLeku.png') }}" /> 
        <span>Ilość w opakowaniu:  </span>
        <span> {{ $lek->ilosc }} </span>
    </div>
    <div class="kontenerOpisu wielkosc2">
        <img class="fotoWielkosc2"  src="{{ asset('img/icons/cenaLeku.png') }}" /> 
        <span>Cena:  </span>
        <span> {{ $lek->cena }} zł</span>
    </div>
    <div class="kontenerOpisu">
        <span class="tytul"> Opis leku </span>
        <span class="opis"> {{ $lek->opis }} </span>
    </div>
    @if($lek->potwierdzenieAdmina == 0)
    <div class="kontenerOpisu2">
    @can('admin')
    <form method="POST" action="{{ route('potwierdzLek', $lek->id) }}" class="deleteForm">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="deleteButton zmienkolor"> Potwierdź lek </button>
    </form> 
    <form method="POST" action="{{ route('usunLek', $lek->id) }}" class="deleteForm">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="deleteButton"> Usuń lek </button>
    </form> 
    @endcan
    </div>
    @endif
</div>

@endsection