<?php

namespace App\Http\Controllers;
use App\Leki;
use Illuminate\Http\Request;

class BazaLekowController extends Controller
{
    public function dodajLek(Request $dodaj){

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
        return view('bazaLekow');
    }
}
