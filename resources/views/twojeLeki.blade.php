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

    <form method="POST" action="{{ route('dodajLekUzytkownika') }}" class="uzupelnijDaneFormularz">
    
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <select class="js-example-basic-single" name="idLeku">
            <option value="" disabled selected>Wybierz lek</option>
            @foreach($wybierzLek as $lek)
            <option value="{{ $lek->id }}">{{ $lek->nazwa }}</option>
            @endforeach
        </select>
        <input name="iloscPaczek" placeholder="Podaj iloscPaczek przepisanych przez lekarza" type="text" />
        <input name="dawkowanie" placeholder="Podaj ile razy w ciągu dnia musisz przyjąć lek" type="text" />
        <input name="czestotliwosc" placeholder="Podaj częstotliwość przyjmowania leku w ciągu dnia (w godzinach)" type="text" />
        <input name="rozpocznij" placeholder="Podaj godzine rozpoczęcia przyjmowania leku" type="time" />
        <input name="rozpocznijData" placeholder="Podaj date rozpoczęcia przyjmowania leku" type="date" />
        <div class="uzupelnijDanePrzycisk">
            <button type="submit">Prześlij dane</button>
        </div>
    </form>


    <div class="tablica">
        <div class="wiersz"> Nazwa </div>
        <div class="wiersz"> Ilosc tabletek </div>
        <div class="wiersz"> Ilosc opakowan </div>
        @foreach($lekiUzytkownika as $lek )
        <div class="wiersz"> {{$lek->nazwa}}  </div>
        <div class="wiersz"> {{$lek->iloscLeku}}</div>
        <div class="wiersz"> {{$lek->iloscPaczek}} </div>
         <form method="POST" action="{{ route('usunLek' , $lek->id) }}" class="deleteForm">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
            <button type="submit" class="deleteButton">Usuń lek</button>
        </form> 
        <form method="POST" action="{{ route('dodajOpakowanie', [$lek->id, $lek->idLeku] )}}" class="deleteForm">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <input name="ilosc" type="number" />
            <div class="uzupelnijDanePrzycisk">
            <button type="submit">Dodaj opakowanie</button>
            </div>
        </form>
        <form method="POST" action="{{ route('dodajLekiNaSztuki', [$lek->id, $lek->idLeku] )}}" class="deleteForm">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <input name="iloscSztuk" type="number" />
            <div class="uzupelnijDanePrzycisk">
            <button type="submit">Dodaj leki</button>
            </div>
        </form>
        @endforeach
    </div>
    
    
@endsection