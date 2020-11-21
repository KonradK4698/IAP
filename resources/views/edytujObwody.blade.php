@extends('layouts.panel')

@section('content')


<form method="POST" action="{{ route('aktualizacjaObwodow', $idObwodu) }}" class="uzupelnijDaneFormularz">
    
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
     @foreach($obwodyEdit as $obwod)
        <input name='biceps' value="{{ $obwod->biceps }}" type="number" step=".1" />
        <input name='klataPiersiowa' value="{{ $obwod->klataPiersiowa }}" type="number" step=".1" />
        <input name='talia' value="{{ $obwod->talia }}" type="number" step=".1" />
        <input name='pas' value="{{ $obwod->pas }}" type="number" step=".1" />
        <input name='biodra' value="{{ $obwod->biodra }}" type="number" step=".1" />
        <input name='uda' value="{{ $obwod->uda }}" type="number" step=".1" />
        <input name='lydka' value="{{ $obwod->lydka }}" type="number" step=".1" />
    @endforeach
        <div class="uzupelnijDanePrzycisk">
            <button type="submit">Prześlij dane</button>
        </div>
    </form>

@endsection