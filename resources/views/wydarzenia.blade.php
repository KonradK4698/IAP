@extends('layouts.panel')

@section('content')


    <form id="dodajPomiarTable" method="POST" action="{{ route('dodajWydarzenie') }}" class="uzupelnijDaneFormularz">
        <span class="tytul"> Dodaj wydarzenie </span>
        <input type="hidden" name="_token" value="{{csrf_token()}}" />

        <span class="opisPozycji"> Wybierz tytuł: </span>
        <select id="wybierzTytul" data-opis="Tytuł" name="tytul" class="form-control">
            <option>Wizyta lekarska</option>
            <option>Zabieg</option>
            <option>Rehabilitacja</option>
        </select>

        <span class="opisPozycji"> Wprowadź datę </span>
        <input data-opis="Data" class="dodajDane" name="data" placeholder="Data wydarzenia" type="date" />

        <span class="opisPozycji"> Wprowadź godzinę </span>
        <input data-opis="Godzina" class="dodajDane" name="godzina" placeholder="Godzina wydarzenia" type="time" />

        <span class="opisPozycji"> Informacje dodatkowe </span>
        <input data-opis="Informacje dodatkowe:" class="dodajDane" name="opis" placeholder="Wprowadź informacje dodatkowe" type="text" />

        <div class="openConfirm">Dodaj wydarzenie</div>
    </form>

    <span class="tytul"> Aktualne wydarzenia </span>
    <table id="wydarzenia" class="display">
        <thead>
            <tr>
                <th>Tytuł</th>
                <th>Data i Godzina</th>
                <th>Opis</th>
            </tr>
        </thead>
        <tbody>
        @foreach($aktualneWydarzenia as $wydarzenie)
            <tr>
                <td>{{$wydarzenie->tytul}}</td>
                <td>{{$wydarzenie->data}} <br/> {{$wydarzenie->godzina}}</td>
                <td>{{$wydarzenie->opis}}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Tytuł</th>
                <th>Data i Godzina</th>
                <th>Opis</th>
            </tr>
        </tfoot>
    </table>

@endsection

<div class="overlay"></div>
<div class="confirmPopupBox">
    <div class="popupInformacjeBox">
        <span class="sprawdzDane"> Sprawdź poprawność danych! <br/> <span class="alertText"> Pamiętaj nie będzie można ich zmienić!</span></span>
    </div>
    <button class="potwierdzDane" type="submit"> Tak </button>
    <button class="zmienDane"> Nie </button>
</div>