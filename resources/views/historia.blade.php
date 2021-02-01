@extends('layouts.panel')

@section('content')
<span class="tytul"> Historia użytkownika </span>
<br/><br/>
<br/><br/>
<span class="tytul"> Waga - dane historyczne </span>
<table id="waga" class="display">
        <thead>
            <tr>
                <th>Data</th>
                <th>Waga</th>
            </tr>
        </thead>
        <tbody>
        @foreach($historiaWag as $waga)
            <tr>
                <td>{{$waga->created_at}}</td>
                <td>{{$waga->waga}} kg</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Data</th>
                <th>Waga</th>
            </tr>
        </tfoot>
    </table>
    <span class="tytul"> Wzrost - dane historyczne </span>
    <table id="wzrost" class="display">
        <thead>
            <tr>
                <th>Data</th>
                <th>Wzrost</th>
            </tr>
        </thead>
        <tbody>
        @foreach($historiaWzrostu as $wzrost)
            <tr>
                <td>{{$wzrost->created_at}}</td>
                <td>{{$wzrost->wzrost}} cm</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Data</th>
                <th>Wzrost</th>
            </tr>
        </tfoot>
    </table>
    <span class="tytul"> Obwody - dane historyczne </span>
    <table id="obwody" class="display">
        <thead>
            <tr>
                <th>Data</th>
                <th>Biceps</th>
                <th>Klatka</th>
                <th>Talia</th>
                <th>Pas</th>
                <th>Biodra</th>
                <th>Uda</th>
                <th>Łydka</th>
            </tr>
        </thead>
        <tbody>
        @foreach($historiaObwody as $obwod)
            <tr>
                <td>{{$obwod->created_at}}</td>
                <td>{{$obwod->biceps}} cm</td>
                <td>{{$obwod->klataPiersiowa}} cm</td>
                <td>{{$obwod->talia}} cm</td>
                <td>{{$obwod->pas}} cm</td>
                <td>{{$obwod->biodra}} cm</td>
                <td>{{$obwod->uda}} cm</td>
                <td>{{$obwod->lydka}} cm</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
            <th>Data</th>
                <th>Biceps</th>
                <th>Klatka</th>
                <th>Talia</th>
                <th>Pas</th>
                <th>Biodra</th>
                <th>Uda</th>
                <th>Łydka</th>
            </tr>
        </tfoot>
    </table>
    <span class="tytul"> Ciśnienie - dane historyczne </span>
    <table id="cisnienie" class="display">
        <thead>
            <tr>
                <th>Data</th>
                <th>Skurczowe</th>
                <th>Rozkurczowe</th>
                <th>Tętno</th>
            </tr>
        </thead>
        <tbody>
        @foreach($historiaCisnienie as $pomiar)
            <tr>
                <td>{{$pomiar->created_at}}</td>
                <td>{{$pomiar->skurczowe}}</td>
                <td>{{$pomiar->rozkurczowe}}</td>
                <td>{{$pomiar->tetno}}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
            <th>Data</th>
                <th>Skurczowe</th>
                <th>Rozkurczowe</th>
                <th>Tętno</th>
            </tr>
        </tfoot>
    </table>
    <span class="tytul"> Wydarzenia - dane historyczne </span>
    <table id="wydarzenia" class="display">
        <thead>
            <tr>
                <th>Tytuł</th>
                <th>Data i Godzina</th>
                <th>Opis</th>
            </tr>
        </thead>
        <tbody>
        @foreach($historiaWydarzenia as $wydarzenie)
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
    <span class="tytul"> Leki - dane historyczne </span>
    <table id="lekiAdmin" class="display">
        <thead>
            <tr>
                <th>Nazwa</th>
                <th>Data i Godzina</th>
                <th>Czy przyjęto?</th>
            </tr>
        </thead>
        <tbody>
        @foreach($historiaLekow as $lek)
            <tr>
                <td>{{$lek->nazwa}}</td>
                <td>{{$lek->data}} <br/> {{$lek->godzina}}</td>
                <td>{{ $lek->potwierdzenie == 0 ? "nie" : "tak"}}</td>
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