<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="{{ asset('css/pdf.css') }}" rel="stylesheet">
</head>
<body>
<table class="tabelaWymiary">
    <tr> <td class="tytul"> Raport użytkownika</td> </tr>
</table>
<table class="tabelaWymiary">
    <tr>   
    @if($imieNazwisko->count() == 0)
    <td class="tytul2"> Email: {{Auth::user()->email}} </td>
    @else
    <td class="tytul2">Imię i Nazwisko: {{$imieNazwisko->first()->imie}} {{$imieNazwisko->first()->nazwisko}} </td>
    @endif
    </tr>
</table>  
<table class="tabelaWymiary">
    <tr>
       <td class="tytul3"> Podsumowanie leków</td>
    </tr>
</table> 
<table class="tabelaWymiary leki">

    <tr>
        <th> Nazwa </th>
        <th> Ilość  </th>
        <th> Cena </th>
        <th> Koszt w miesiącu </th>
    </tr>
@foreach($kolekcja as $lek)
    <tr>
    <td>{{$lek['nazwa']}}</td>
    <td>{{$lek['sztuki']}}</td>
    <td>{{$lek['cena']}} zł</td>
    <td>{{$lek['kosztMiesiac']}} zł</td>
    </tr>
@endforeach
<tr>
    <td></td>
    <td></td>
    <td></td>
    <td>Suma: {{ round($kosztCalkowity,2) }} zł</td>
</tr>
</table>

<table class="tabelaWymiary">
    <tr>
       <td class="tytul3"> Podsumowanie wymiarów użytkownika</td>
    </tr>
</table>
<table class="tabelaWymiary">
    <tr>
        <th> Nazwa </th>
        <th> Wartość minimalna </th>
        <th> Wartość średnia </th>
        <th> Wartość maksymalna </th>
    </tr>

@foreach($obwodyDane as $key=>$obwod)
    <tr>
    <td>{{$key}}</td>
    <td>{{$obwod['min']}}</td>
    <td>{{$obwod['avg']}}</td>
    <td>{{$obwod['max']}}</td>
    </tr>
@endforeach
</table>

<table class="tabelaWymiary">
    <tr>
       <td class="tytul3"> Podsumowanie pomiarów ciśnienia</td>
    </tr>
</table>
<table class="tabelaWymiary">
    <tr>
        <th> Nazwa pomiaru </th>
        <th> Wartość minimalna </th>
        <th> Wartość średnia </th>
        <th> Wartość maksymalna </th>
    </tr>

@foreach($cisnienieDane as $key=>$cisnienie)
    <tr>
    <td>{{$key}}</td>
    <td>{{$cisnienie['min']}}</td>
    <td>{{$cisnienie['avg']}}</td>
    <td>{{$cisnienie['max']}}</td>
    </tr>
@endforeach
</table>
</body>
</html>