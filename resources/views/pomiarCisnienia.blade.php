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

    <form method="POST" action="{{ route('dodajPomiary') }}" class="uzupelnijDaneFormularz">
    
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <input name="skurczowe" placeholder="Podaj cisnienie skurczowe" type="text" />
        <input name="rozkurczowe" placeholder="Podaj cisnienie rozkurczowe" type="text" />
        <input name="tetno" placeholder="Podaj tętno" type="text" />
        <div class="uzupelnijDanePrzycisk">
            <button type="submit">Prześlij dane</button>
        </div>
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