@extends('layouts.panel')

@section('content')
<form method="POST" action="{{ route('dodajWzrostPost') }}" class="uzupelnijDaneFormularz">
    
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <input name="wzrost" placeholder="Podaj wzrost" type="number" step=".01"/>
        <div class="uzupelnijDanePrzycisk">
            <button type="submit">Prześlij dane</button>
        </div>
    </form>

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
@endsection