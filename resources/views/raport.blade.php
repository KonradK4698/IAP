@extends('layouts.panel')

@section('content')
<span class="tytul"> Miesięczne raporty użytkownika </span>

<div class="kontenerRaportow">
    @for($i = 1; $i <= $aktualnyMiesiac; $i++)
    <a class="pobierzPDF" href="{{route('utworzPDF', $i)}}">
    <img src="{{ asset('img/icons/pdf.png') }}" >
     Pobierz raport za miesiąc 
     @switch($i)
        @case(1)
         Styczeń
        @break
        @case(2)
         Luty
        @break
        @case(3)
         Marzec
        @break
        @case(4)
         Kwiecień
        @break
        @case(5)
         Maj
        @break
        @case(6)
         Czerwiec
        @break
        @case(7)
         Lipiec
        @break
        @case(8)
         Sierpień
        @break
        @case(9)
         Wrzesień
        @break
        @case(10)
         Październik
        @break
        @case(11)
         Listopad
        @break
        @case(12)
         Grudzień
        @break
    @endswitch </a>
    

    @endfor  
</div>


@endsection