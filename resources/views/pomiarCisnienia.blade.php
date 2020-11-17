@extends('layouts.panel')

@section('content')
    <form method="POST" action="{{ route('dodajPomiary') }}" class="uzupelnijDaneFormularz">
    
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <input name="skurczowe" placeholder="Podaj cisnienie skurczowe" type="text" />
        <input name="rozkurczowe" placeholder="Podaj cisnienie rozkurczowe" type="text" />
        <input name="tetno" placeholder="Podaj tętno" type="text" />
        <div class="uzupelnijDanePrzycisk">
            <button type="submit">Prześlij dane</button>
        </div>
    </form>
@endsection