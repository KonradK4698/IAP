<h1> Testowy email </h1>
<br/>
<h2> Wydarzenia </h2>
@foreach($leki as $lek)

<p> {{$lek->nazwa}}  {{$lek->data}} {{$lek->godzina}} </p>


@endforeach

@foreach($wydarzenia as $wydarzenie)

<p> {{$wydarzenie->id}} </p>

@endforeach