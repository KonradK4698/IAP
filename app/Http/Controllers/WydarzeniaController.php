<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wydarzenia;
use Auth;
use DB;
class WydarzeniaController extends Controller
{

    public function dodaj(Request $dodaj){

        $dodaj->validate([
            'tytul' => 'required|string',
            'data' => 'required|date_format:Y-m-d',
            'godzina' => 'required|date_format:H:i',
        ]);

        $dodajWydarzenie = new Wydarzenia;
        $dodajWydarzenie->idUzytkownika = Auth::id();
        $dodajWydarzenie->tytul = $dodaj->tytul;
        $dodajWydarzenie->data = $dodaj->data;
        $dodajWydarzenie->godzina = $dodaj->godzina;
        if(is_null($dodaj->opis) == true){
            $dodajWydarzenie->opis = "Brak opisu";
        }else{
            $dodajWydarzenie->opis = $dodaj->opis;
        }
        $dodajWydarzenie->save();

        return redirect()->route('wydarzenia');
    }

    public function widok(){
        $aktualneWydarzenia = DB::table('wydarzenia')->where('idUzytkownika','=',Auth::id())->where('data','>=',now())->get();
        return view('wydarzenia')->with(compact('aktualneWydarzenia'));
    }
}
