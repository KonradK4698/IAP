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
            'wzrost' => 'required|digits_between:1,5|numeric',
        ]);

        $dodaj = new Wzrost;
        $dodaj->idUzytkownika = Auth::id();
        $dodaj->wzrost = $request->wzrost;
        $dodaj->save();

        return redirect()->route('daneDodatkowe');
    }

    public function dodajWage(Request $pobierz){

        $walidacja = $pobierz->validate([
            'waga' => 'required|digits_between:1,5|numeric',
        ]);

        $dodaj = new Waga;
        $dodaj->idUzytkownika = Auth::id();
        $dodaj->waga = $pobierz->waga;
        $dodaj->save();

        return redirect()->route('daneDodatkowe');
    }

    public function dodajObwody(Request $obwod){

        $walidacja = $obwod->validate([
            'biceps' => 'required|digits_between:1,5|numeric',
            'klataPiersiowa' => 'required|digits_between:1,5|numeric',
            'talia' => 'required|digits_between:1,5|numeric',
            'pas' => 'required|digits_between:1,5|numeric',
            'biodra' => 'required|digits_between:1,5|numeric',
            'uda' => 'required|digits_between:1,5|numeric',
            'lydka' => 'required|digits_between:1,5|numeric',
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

        $wagi = DB::table('waga')->select('waga', 'created_at')->where('idUzytkownika', '=', Auth::id())->get();
        $wzrosty = DB::table('wzrost')->select('wzrost', 'created_at')->where('idUzytkownika', '=', Auth::id())->get();
        $obwody = DB::table('obwody')->select('biceps', 'klataPiersiowa', 'talia', 'pas', 'biodra', 'uda', 'lydka', 'created_at')->where('idUzytkownika', '=', Auth::id())->get();
        return view('daneDodatkowe')->with(compact('wagi', 'wzrosty', 'obwody'));
    }
}
