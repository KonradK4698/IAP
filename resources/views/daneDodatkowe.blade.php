@extends('layouts.panel')

@section('content')
    <form method="POST" action="{{ action('DaneDodatkowe@store') }}" class="uzupelnijDaneFormularz">
    
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <input name="waga" placeholder="Podaj wagę" type="number" step=".01"/>
        <input name="wzrost" placeholder="Podaj wagę" type="number" step=".01"/>
        <input name='łydka' placeholder="Podaj wymiar łydki" type="number" step=".1" />
        <input name='udo' placeholder="Podaj wymiar łydki" type="number" step=".1" />
        <input name='brzuch' placeholder="Podaj wymiar łydki" type="number" step=".1" />
        <div class="uzupelnijDanePrzycisk">
            <button type="submit">Prześlij dane</button>
        </div>
    </form>
@endsection