<h1> Testowy email </h1>
<br/>
<h2> Leki do wzięcia </h2>
@foreach($leki as $lek)

<p> {{$lek->nazwa}}  {{$lek->data}} {{$lek->godzina}} <a href="localhost/medicamenthelper/public/home/daneUzytkownika"> Home </a></p>


@endforeach

<h2> Nadchodzące wydarzenia </h2>
@foreach($wydarzenia as $wydarzenie)

<p> {{$wydarzenie->tytul}} </p>

@endforeach