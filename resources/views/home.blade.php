@extends('layouts.panel')

@section('content')
<div class="homeKontener">
    @if($imieUzytkownika->count() > 0)
    <span> Witaj {{ $imieUzytkownika->first()->imie }} </span>
    @else
    <span> Witaj użytkowniku </span>
    @endif

</div>



 @foreach($posortowane as $dane)
    <div class="harmonogramTest">
        <span class="harmonogramTestSpan"> {{$dane->id}}</span>
        <span class="harmonogramTestSpan"> {{$dane->data}}</span>
        <span class="harmonogramTestSpan"> {{$dane->godzina}}</span>
        
        <span class="harmonogramTestSpan"> {{$dane->potwierdzenie}} </span>
      
        <span class="harmonogramTestSpan">
            <form method="post" action="{{route('przyjmijLek', $dane->id)}}"> 
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <button type="submit"  class="deleteButton">TAK</button>
            </form> 
        </span>
    </div>
    @endforeach
    @endsection

    {{--<div id="chartdiv"></div>
@section('statystykaCisnienie')
    @foreach($daneCisnienia as $dana)
        {"data" : new Date("{{$dana->created_at->format('Y-m-d H:M:s')}}"),"skurczowe" : {{$dana->skurczowe}},"rozkurczowe" : {{$dana->rozkurczowe}},"tetno" : {{$dana->tetno}}},
    @endforeach
@endSection --}}

    
