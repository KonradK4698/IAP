@extends('layouts.panel')

@section('content')
<span class="tytul"> Miesięczne raporty użytkownika </span>
@for($i = 1; $i <= $aktualnyMiesiac; $i++)
<div class="kontenerRaportow">
    <a class="pobierzPDF" href="{{route('utworzPDF', $i)}}">
    <img src="{{ asset('img/icons/pdf.png') }}" >
     Pobierz raport za miesiąc {{ $i }} </a><br/>
</div>
@endfor

@endsection