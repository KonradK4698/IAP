<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="{{ asset('css/pdf.css') }}" rel="stylesheet">
</head>
<body>

<span class="tytul"> Raport użytkownika </span>
<span class="raportDane">Imię i Nazwisko: {{$imieNazwisko->first()->imie}} {{$imieNazwisko->first()->nazwisko}} </span>
<br/>
Twoje dane o lekach
<br/><br/>
@foreach($kolekcja as $lek)

    Nazwa: {{$lek['nazwa']}}<br/>
    sztuki: {{$lek['sztuki']}}<br/>
    cena: {{$lek['cena']}}<br/>
    kosztMiesiac: {{$lek['kosztMiesiac']}}<br/><br/>

@endforeach

Twoje obwody
<br/><br/>
@foreach($obwodyDane as $key=>$obwod)
    Obwód: {{$key}}<br/>
    Min: {{$obwod['min']}}<br/>
    Max: {{$obwod['max']}}
    <br/><br/>
@endforeach
</body>
</html>