<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\daneUzytkownika;
use DB;
use Auth;


class DaneUzytkownikaController extends Controller
{
    public function widok(){
        return view('daneUzytkownika');
    }

    public function store(Request $request){

        $walidacja = $request->validate([
            'imie' => 'required|max:20|string',
            'nazwisko' => 'required|max:20|string',
            'dataUrodzenia' => 'required|date',
            'telefon' => 'required|digits_between:9,12',
            'telefonPom' => 'required|digits_between:9,12',
        ]);

        $data = new daneUzytkownika;
        $data->idUzytkownika = Auth::id();
        $data->imie = $request->imie;
        $data->nazwisko = $request->nazwisko;
        $data->dataUrodzenia = $request->dataUrodzenia;
        $data->telefon = $request->telefon;
        $data->telefonPomocniczy = $request->telefonPom;
        $data->save();

        return redirect()->route('daneUzytkownika');
    }
    
    
}
