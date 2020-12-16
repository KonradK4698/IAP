
Twój raport {{$imieNazwisko->first()->imie}} {{$imieNazwisko->first()->nazwisko}}

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