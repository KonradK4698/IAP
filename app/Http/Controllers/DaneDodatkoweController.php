<?php

namespace App\Http\Controllers;
use App\Wzrost;
use App\Obwody;
use Illuminate\Http\Request;
use Auth;
use DB;

class DaneDodatkoweController extends Controller
{
    

    public function dodajWzrost(Request $request){

        $dodaj = new Wzrost;
        $dodaj->idUzytkownika = Auth::id();
        $dodaj->wzrost = $request->wzrost;
        $dodaj->save();

        return redirect()->route('daneDodatkowe');
    }

    public function dodajObwody(Request $obwod){
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
