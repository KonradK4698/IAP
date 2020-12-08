@extends('layouts.panel')

@section('content')
<div class="homeKontener">
    <span> Witaj Użytkowniku </span>


</div>



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
@endsection
