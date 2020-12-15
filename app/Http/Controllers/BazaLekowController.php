<?php

namespace App\Http\Controllers;
use App\Leki;
use DB;
use Illuminate\Http\Request;

class BazaLekowController extends Controller
{
    public function dodajLek(Request $dodaj){
        
        $walidacja = $dodaj->validate([
            'nazwa' => 'required|string|unique:Leki',
            'zalecaneDawkowanie' => 'required|numeric',
            'ilosc' => 'required|numeric',
            'cena' => 'required|numeric',
            'opis' => 'required|string',
        ]);
        
        $dodajLek = new Leki;
        $dodajLek->nazwa = $dodaj->nazwa;
        $dodajLek->zalecaneDawkowanie = $dodaj->zalecaneDawkowanie;
        $dodajLek->ilosc = $dodaj->ilosc;
        $dodajLek->cena = $dodaj->cena;
        $dodajLek->opis = $dodaj->opis;
        $dodajLek->save();
        return redirect()->route('bazaLekow');
    }

    public function widok(){

        $leki = DB::table('leki')->select('nazwa', 'zalecaneDawkowanie', 'ilosc', 'cena', 'opis')->get();

        return view('bazaLekow')->with(compact('leki'));
    }
}
