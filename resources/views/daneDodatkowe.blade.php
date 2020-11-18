@extends('layouts.panel')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('dodajWzrostPost') }}" class="uzupelnijDaneFormularz">
    
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <input name="wzrost" placeholder="Podaj wzrost" type="number" step=".01"/>
        <div class="uzupelnijDanePrzycisk">
            <button type="submit">Prześlij dane</button>
        </div>
    </form>

    <div class="tablica">
        <div class="wiersz2"> data </div>
        <div class="wiersz2"> wzrost </div>
        @foreach($wzrosty as $wzrost)
        <div class="wiersz2"> {{ $wzrost->created_at}} </div>
        <div class="wiersz2"> {{ $wzrost->wzrost }}</div>
        @endforeach
    </div>

    <form method="POST" action="{{ route('dodajWage') }}" class="uzupelnijDaneFormularz">
    
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <input name='waga' placeholder="Podaj wage" type="number" step=".1" />
        <div class="uzupelnijDanePrzycisk">
            <button type="submit">Prześlij dane</button>
        </div>
    </form>

    <div class="tablica">
        <div class="wiersz2"> data </div>
        <div class="wiersz2"> waga </div>
        @foreach($wagi as $waga)
        <div class="wiersz2"> {{ $waga->created_at}} </div>
        <div class="wiersz2"> {{ $waga->waga }}</div>
        @endforeach
    </div>

    <form method="POST" action="{{ route('dodajObwody') }}" class="uzupelnijDaneFormularz">
    
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <input name='biceps' placeholder="Podaj wymiar biceps" type="number" step=".1" />
        <input name='klataPiersiowa' placeholder="Podaj wymiar klataPiersiowa" type="number" step=".1" />
        <input name='talia' placeholder="Podaj wymiar talia" type="number" step=".1" />
        <input name='pas' placeholder="Podaj wymiar pas" type="number" step=".1" />
        <input name='biodra' placeholder="Podaj wymiar biodra" type="number" step=".1" />
        <input name='uda' placeholder="Podaj wymiar uda" type="number" step=".1" />
        <input name='lydka' placeholder="Podaj wymiar łydka" type="number" step=".1" />
        <div class="uzupelnijDanePrzycisk">
            <button type="submit">Prześlij dane</button>
        </div>
    </form>

    <div class="tablica">
        <div class="wiersz3"> data </div>
        <div class="wiersz3"> biceps </div>
        <div class="wiersz3"> klatka</div>
        <div class="wiersz3"> talia </div>
        <div class="wiersz3"> pas </div>
        <div class="wiersz3"> biodra </div>
        <div class="wiersz3"> uda </div>
        <div class="wiersz3"> lydka </div>
        @foreach($obwody as $obwod)
        <div class="wiersz3"> {{ $obwod->created_at}} </div>
        <div class="wiersz3"> {{ $obwod->biceps }}</div>
        <div class="wiersz3"> {{ $obwod->klataPiersiowa }}</div>
        <div class="wiersz3"> {{ $obwod->talia }}</div>
        <div class="wiersz3"> {{ $obwod->pas }}</div>
        <div class="wiersz3"> {{ $obwod->biodra }}</div>
        <div class="wiersz3"> {{ $obwod->uda }}</div>
        <div class="wiersz3"> {{ $obwod->lydka }}</div>
        @endforeach
    </div>
@endsection