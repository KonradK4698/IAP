<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wydarzenia;
use Auth;
class WydarzeniaController extends Controller
{

    public function dodaj(Request $dodaj){

        $dodajWydarzenie = new Wydarzenia;
        $dodajWydarzenie->idUzytkownika = Auth::id();
        $dodajWydarzenie->tytul = $dodaj->tytul;
        $dodajWydarzenie->data = $dodaj->data;
        $dodajWydarzenie->godzina = $dodaj->godzina;
        $dodajWydarzenie->opis = $dodaj->opis;
        $dodajWydarzenie->save();

        return redirect()->route('wydarzenia');
    }

    public function widok(){
        return view('wydarzenia');
    }
}
