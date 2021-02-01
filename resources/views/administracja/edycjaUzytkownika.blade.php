@extends('layouts.panel')

@section('content')
<span class="tytul"> Edytuj użytkownika {{ $email->email }} </span>

<div class="kontenerInformacji"> 
<span class="tytul"> Dane użytkownika</span>
        @foreach($daneOsobowe as $dana)
        
        <div class="daneOsobowe"> 
            <img src="{{ asset('img/icons/imieNazwisko.png') }}" >
            <span>Imię i Nazwisko</span> 
            <span class="bigFirstLetter">{{ $dana->imie}} {{ $dana->nazwisko }}</span>
        </div>
        <div class="daneOsobowe"> 
            <img src="{{ asset('img/icons/urodziny.png') }}" >
            <span> Data urodzenia: </span>
            <span> {{ $dana->dataUrodzenia }} </span>
        </div>
        <div class="daneOsobowe"> 
            <img src="{{ asset('img/icons/telefon.png') }}" >
            <span> Numer telefonu: </span>
            <span> {{ $dana->telefon }} </span>
        </div>
        <div class="daneOsobowe"> 
            <img src="{{ asset('img/icons/telefon2.png') }}" >
            <span> Telefon zaufany: </span>
            <span> {{ $dana->telefonPomocniczy }} </span>
        </div>
        <div class="daneOsobowe"> 
            <span> Edytuj dane użytkownika </span>
            <span> <a class="edytujButton" href="{{route('edytujDaneUzytkownika', $dana->id)}}"> Edytuj </a> </span>
        </div>
        <div class="daneOsobowe"> 
            <span> Usuń dane użytkownika </span>
            <span> <form method="POST" action="{{ route('usunDaneUzytkownika' , $dana->id) }}" class="deleteForm">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="deleteButton">Usuń</button>
                    </form>  </span>
        </div>
        
        @endforeach
</div>

<div class="kontenerInformacji"> 
<span class="tytul"> Edycja wag </span>
<table id="waga" class="display">
        <thead>
            <tr>
                <th>Data</th>
                <th>Waga</th>
                <th>Edytuj</th>
                <th>Usuń</th>
            </tr>
        </thead>
        <tbody>
        @foreach($wagiU as $waga)
            <tr>
                <td>{{$waga->created_at}}</td>
                <td>{{$waga->waga}}</td>
                <td><a class="edytujButton" href="{{route('edytujWageUzytkownika', $waga->id)}}"> Edytuj </a></td>
                <td><form method="POST" action="{{ route('usunWageUzytkownika' , $waga->id) }}" class="deleteForm">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="deleteButton">Usuń</button>
                    </form> 
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Data</th>
                <th>Waga</th>
                <th>Edytuj</th>
                <th>Usuń</th>
            </tr>
        </tfoot>
    </table>
    <span class="tytul"> Edycja wzrostu</span>
    <table id="wzrost" class="display">
        <thead>
            <tr>
                <th>Data</th>
                <th>Wzrost</th>
                <th>Edytuj</th>
                <th>Usuń</th>
            </tr>
        </thead>
        <tbody>
        @foreach($wzrostU as $wzrost)
            <tr>
                <td>{{$wzrost->created_at}}</td>
                <td>{{$wzrost->wzrost}}</td>
                <td><a class="edytujButton" href="{{route('edytujWzrostUzytkownika', $wzrost->id)}}"> Edytuj </a></td>
                <td><form method="POST" action="{{ route('usunWzrostUzytkownika' , $wzrost->id) }}" class="deleteForm">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="deleteButton">Usuń</button>
                    </form> 
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Data</th>
                <th>Wzrost</th>
                <th>Edytuj</th>
                <th>Usuń</th>
            </tr>
        </tfoot>
    </table>
    <span class="tytul"> Edycja obwodów </span>
    <table id="obwody" class="display">
        <thead>
            <tr>
                <th>Data</th>
                <th>Edytuj</th>
                <th>Usuń</th>
            </tr>
        </thead>
        <tbody>
        @foreach($obwodyU as $obwod)
            <tr>
                <td>{{$obwod->created_at}}</td>
                <td><a class="edytujButton" href="{{route('edytujObwodyUzytkownika', $obwod->id)}}"> Edytuj </a></td>
                <td><form method="POST" action="{{ route('usunObwodyUzytkownika' , $obwod->id) }}" class="deleteForm">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="deleteButton">Usuń</button>
                    </form> 
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Data</th>
                <th>Edytuj</th>
                <th>Usuń</th>
            </tr>
        </tfoot>
    </table>
    <span class="tytul"> Edycja leków</span>
    <table id="lekiAdmin" class="display">
        <thead>
            <tr>
                <th>Data utworzenia</th>
                <th>Nazwa leku</th>
                <th>Usuń</th>
            </tr>
        </thead>
        <tbody>
        @foreach($lekiU as $lek)
            <tr>
                <td>{{$lek->created_at}}</td>
                <td>{{$lek->nazwa}} </a></td>
                <td><form method="POST" action="{{ route('usunLekUzytkownika' , $lek->id) }}" class="deleteForm">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="deleteButton">Usuń</button>
                    </form> 
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Data utworzenia</th>
                <th>Nazwa leku</th>
                <th>Usuń</th>
            </tr>
        </tfoot>
    </table>
    <span class="tytul"> Edycja wydarzeń</span>
    <table id="wydarzenia" class="display">
        <thead>
            <tr>
                <th>Data utworzenia</th>
                <th>Tytuł wydarzenia</th>
                <th>Usuń</th>
            </tr>
        </thead>
        <tbody>
        @foreach($wydarzeniaU as $wydarzenie)
            <tr>
                <td>{{$wydarzenie->created_at}}</td>
                <td>{{$wydarzenie->tytul}}</a></td>
                <td><form method="POST" action="{{ route('usunWydarzenieUzytkownika' , $wydarzenie->id) }}" class="deleteForm">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="deleteButton">Usuń</button>
                    </form> 
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Data utworzenia</th>
                <th>Tytuł wydarzenia</th>
                <th>Usuń</th>
            </tr>
        </tfoot>
    </table>
    <span class="tytul"> Edycja ciśnienia</span>
    <table id="cisnienie" class="display">
        <thead>
            <tr>
                <th>Data utworzenia</th>
                <th>Skurczowe</th>
                <th>Rozkurczowe</th>
                <th>Tętno</th>
                <th>Usuń</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cisnienieU as $cisnienie)
            <tr>
                <td>{{$cisnienie->created_at}}</td>
                <td>{{$cisnienie->skurczowe}}</a></td>
                <td>{{$cisnienie->rozkurczowe}}</a></td>
                <td>{{$cisnienie->tetno}}</a></td>
                <td><form method="POST" action="{{ route('usunCisnienieUzytkownika' , $cisnienie->id) }}" class="deleteForm">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="deleteButton">Usuń</button>
                    </form> 
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Data utworzenia</th>
                <th>Skurczowe</th>
                <th>Rozkurczowe</th>
                <th>Tętno</th>
                <th>Usuń</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection