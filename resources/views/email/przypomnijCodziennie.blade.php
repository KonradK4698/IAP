<html>
    <head>
    <style>
        h1, h2{
            display: inline-block;
            width: 100%;
            text-align: center;
            font-weight: bold;
        }
        h1{
            font-size: 30px;
        }
        h2{
            font-size: 25px;
        }
        .przypomnij{
            display: inline-block;
            width: 100%;
            padding: 10px;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            color: green;
        }
        .potwierdz{
            display: inline-block;
            width: 100%;
            padding: 10px;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            color: red;
            text-decoration: underline;
        }
</style>
    </head>
    <body>
        <h1> Powiadomienie z aplikacji Inteligentny Asystent Pacjenta</h1>
            <br/>
        @if(is_null($leki) == false)
        <h2> Leki do przyjęcia w dniu {{$leki->first()->data}}  </h2>
        @foreach($leki as $lek)

            <span class="przypomnij"> {{$lek->nazwa}} - {{$lek->godzina}}</span>


        @endforeach
        @endif 
        <span class="potwierdz"> Przejdź proszę do panelu pacjenta, i potwierdź przyjęcie leku.</span>
        @if($wydarzenia->count() > 0)
        <h2> Nadchodzące wydarzenia </h2>
        @foreach($wydarzenia as $wydarzenie)

        <span class="przypomnij"> {{$wydarzenie->tytul}} {{$wydarzenie->data}} {{$wydarzenie->godzina}} 
        <br/> {{$wydarzenie->opis}} </span>

        @endforeach
        @endif

        <span class="potwierdz"> Pamiętaj o dodaniu wykonanych pomiarów ciśnienia.</span>
    </body>
</html>



