<?php

namespace App\Http\Controllers;
use App\Wzrost;
use App\Waga;
use App\Obwody;
use Illuminate\Http\Request;
use Auth;
use DB;

class DaneDodatkoweController extends Controller
{
    

    public function dodajWzrost(Request $request){

        $walidacja = $request->validate([
            'wzrost' => 'required|max:5|numeric',
        ]);

        $dodaj = new Wzrost;
        $dodaj->idUzytkownika = Auth::id();
        $dodaj->wzrost = $request->wzrost;
        $dodaj->save();

        return redirect()->route('daneDodatkowe');
    }

    public function dodajWage(Request $pobierz){

        $walidacja = $pobierz->validate([
            'waga' => 'required|max:5|numeric',
        ]);

        $dodaj = new Waga;
        $dodaj->idUzytkownika = Auth::id();
        $dodaj->waga = $pobierz->waga;
        $dodaj->save();

        return redirect()->route('daneDodatkowe');
    }

    public function dodajObwody(Request $obwod){

        $walidacja = $obwod->validate([
            'biceps' => 'required|max:5|numeric',
            'klataPiersiowa' => 'required|max:5|numeric',
            'talia' => 'required|max:5|numeric',
            'pas' => 'required|max:5|numeric',
            'biodra' => 'required|max:5|numeric',
            'uda' => 'required|max:5|numeric',
            'lydka' => 'required|max:5|numeric',
        ]);


        $dodajObwod = new Obwody;
        $dodajObwod->idUzytkownika = Auth::id();
        $dodajObwod->biceps = $obwod->biceps;
        $dodajObwod->klataPiersiowa = $obwod->klataPiersiowa;
        $dodajObwod->talia = $obwod->talia;
        $dodajObwod->pas = $obwod->pas;
        $dodajObwod->biodra = $obwod->biodra;
        $dodajObwod->uda = $obwod->uda;
        $dodajObwod->lydka = $obwod->lydka;
        $dodajObwod->save();

        return redirect()->route('daneDodatkowe');
    }

    public function widok(){
        return view('daneDodatkowe');
    }
}
