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
        <h1> Powiadomienie z aplikacji Inteligentny Asysten Pacjenta</h1>
            <br/>
        @if($lekDoPrzyjecia->count()  > 0)
        <h2> Leki do przyjęcia w najbliżych 30 minutach</h2>
        @foreach($lekDoPrzyjecia as $lek)

            <span class="przypomnij"> {{$lek->nazwa}} - {{$lek->godzina}} </span>


        @endforeach
        <span class="potwierdz"> Przejdź proszę do panelu pacjenta, i potwierdź przyjęcie leku.</span>
        @endif 
        @if($nadchodzaceWydarzenie->count() > 0)
        <h2> Nadchodzące wydarzenia </h2>
        @foreach($nadchodzaceWydarzenie as $wydarzenie)

        <span class="przypomnij"> {{$wydarzenie->tytul}} {{$wydarzenie->data}} {{$wydarzenie->godzina}} <br/> {{$wydarzenie->opis}} </span>

        @endforeach
        @endif
    </body>
</html>



