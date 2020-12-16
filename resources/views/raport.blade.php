@extends('layouts.panel')

@section('content')

@for($i = 1; $i <= $aktualnyMiesiac; $i++)
<a href="{{route('utworzPDF', $i)}}"> PDF pobierz {{$i}} </a><br/>
@endfor

@endsection