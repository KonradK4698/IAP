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
        <input name="dawkowanie" placeholder="Podaj dawkowanie zlecone przez lekarza" type="text" />
        <input name="czestotliwosc" placeholder="Podaj ile raz w tygodniu musisz przyjmować lek" type="text" />
        <div class="uzupelnijDanePrzycisk">
            <button type="submit">Prześlij dane</button>
        </div>
    </form>
@endsection