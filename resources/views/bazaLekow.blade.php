@extends('layouts.panel')

@section('content')
<span class="tytul"> Baza leków </span>
<table id="leki" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Nazwa leku</th>
                <th>Więcej informacji</th>
            </tr>
        </thead>
        <tbody>
        @foreach($leki as $lek)
            <tr>
                <td>{{ $lek->nazwa}}</td>
                <td><a href="{{route('opisLeku', $lek->id)}}"> Kliknij tutaj </a></td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Nazwa</th>
                <th>Więcej informacji</th>
            </tr> 
        </tfoot>
    </table>


    <form id="dodajLekTable" method="POST" action="{{ route('dodajLek') }}" class="uzupelnijDaneFormularz">
        <span class="tytul"> Dodaj lek</span>
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <span class="opisPozycji"> Podaj nazwę leku</span>
        <input data-opis="Nazwa leku" class="dodajDane"  name="nazwa" placeholder="Podaj nazwe" type="text" />

        <span class="opisPozycji"> Podaj zalecane dawkowanie</span>
        <input data-opis="Zalecane dawkowanie" class="dodajDane" name="zalecaneDawkowanie" placeholder="Podaj zalecaneDawkowanie" type="text" />

        <span class="opisPozycji"> Ilość w opakowaniu</span>
        <input data-opis="Ilość w opakowaniu" class="dodajDane" name="ilosc" placeholder="Podaj ilosc w opakowaniu" type="text" />

        <span class="opisPozycji"> Cena za opakowanie</span>
        <input data-opis="Cena za opakowanie" class="dodajDane" name="cena" placeholder="Podaj cene" type="text" />

        <span class="opisPozycji"> Opis produktu</span>
        <input data-opis="Opis produktu" class="dodajDane" name="opis" placeholder="Podaj opis" type="text" />

        <div class="openConfirm">Dodaj lek do bazy</div>
    </form>
@endsection

<div class="overlay"></div>
<div class="confirmPopupBox">
    <div class="popupInformacjeBox">
        <span class="sprawdzDane"> Sprawdź poprawnośc danych! <br/> <span class="alertText"> Pamiętaj nie będzie można ich zmienić!</span></span>
    </div>
    <button class="potwierdzDane" type="submit"> Tak </button>
    <button class="zmienDane"> Nie </button>
</div>



