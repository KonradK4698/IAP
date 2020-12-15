@extends('layouts.panel')

@section('content')
<div class="homeKontener">
    @isset($imieUzytkownika)
    <span> Witaj {{ $imieUzytkownika }} </span>
    @else
    <span> Witaj użytkowniku </span>
    @endisset

</div>
@endsection
{{--<div id="chartdiv"></div>

 @foreach($posortowane as $dane)
    <div class="harmonogramTest">
        <span class="harmonogramTestSpan"> {{$dane->id}}</span>
        <span class="harmonogramTestSpan"> {{$dane->data}}</span>
        <span class="harmonogramTestSpan"> {{$dane->godzina}}</span>
        <span class="harmonogramTestSpan">
            <form method="post" action="{{route('przyjmijLek', $dane->id)}}"> 
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <button type="submit"  class="deleteButton">TAK</button>
            </form> 
        </span>
    </div>
    @endforeach



@section('statystykaCisnienie')
    @foreach($daneCisnienia as $dana)
        {"data" : new Date("{{$dana->created_at->format('Y-m-d H:M:s')}}"),"skurczowe" : {{$dana->skurczowe}},"rozkurczowe" : {{$dana->rozkurczowe}},"tetno" : {{$dana->tetno}}},
    @endforeach
@endSection --}}

    
