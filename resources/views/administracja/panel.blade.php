@extends('layouts.panel')

@section('content')

<span class="tytul"> Zarządaj użytkownikami </span>

<table id="potwierdzLek" class="display" >
        <thead>
            <tr>
                <th>Nazwa leku</th>
                <th>Więcej informacji</th>
            </tr>
        </thead>
        <tbody>
        @foreach($lekiDoPotwierdzenia as $lek)
            <tr>
                <td>{{ $lek->nazwa}}</td>
                <td><a href="{{route('opisLeku', $lek->id)}}"> Kliknij tutaj </a></td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Nazwa</th>
                <th>Więcej informacji</th>
            </tr> 
        </tfoot>
    </table>

<table id="uzytkownicy" class="display">
        <thead>
            <tr>
                <th>Imię</th>
                <th>Email</th>
                <th>Edytuj</th>
                <th>Usuń</th>
            </tr>
        </thead>
        <tbody>
        @foreach($uzytkownicy as $uzytkownik)
            <tr>
                <td>{{$uzytkownik->imie}}</td>
                <td>{{$uzytkownik->email}}</td>
                <td><a class="edytujButton" href="{{route('edytujUzytkownika', $uzytkownik->id)}}"> Edytuj </a></td>
                <td><form method="POST" action="{{ route('usunUzytkownika' , $uzytkownik->id) }}" class="deleteForm">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="deleteButton">Usuń</button>
                    </form> 
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Imię</th>
                <th>Email</th>
                <th>Edytuj</th>
                <th>Usuń</th>
            </tr>
        </tfoot>
    </table>
@endsection