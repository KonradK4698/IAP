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
            'wzrost' => 'required|numeric',
        ]);

        $dodaj = new Wzrost;
        $dodaj->idUzytkownika = Auth::id();
        $dodaj->wzrost = $request->wzrost;
        $dodaj->save();

        return  redirect()->route('daneDodatkowe');
    }

    public function usunWzrost( $id){
        $usuwanieWzrostu = Wzrost::findOrFail($id);
        $usuwanieWzrostu->delete();
        return redirect()->route('daneDodatkowe');
    }

    public function dodajWage(Request $pobierz){

        $walidacja = $pobierz->validate([
            'waga' => 'required|numeric',
        ]);

        $dodaj = new Waga;
        $dodaj->idUzytkownika = Auth::id();
        $dodaj->waga = $pobierz->waga;
        $dodaj->save();

        return redirect()->route('daneDodatkowe');
    }

    public function usunWage($id){
        $usuwanieWagi = Waga::findOrFail($id)->delete();
        return redirect()->route('daneDodatkowe');
    }

    public function dodajObwody(Request $obwod){

        $walidacja = $obwod->validate([
            'biceps' => 'required|numeric',
            'klataPiersiowa' => 'required|numeric',
            'talia' => 'required|numeric',
            'pas' => 'required|numeric',
            'biodra' => 'required|numeric',
            'uda' => 'required|numeric',
            'lydka' => 'required|numeric',
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

    public function edytuj($id){
        $obwodyEdit = DB::table('obwody')->where('id', '=', $id)->get();
        $idObwodu = $id;
        return view('edytujObwody')->with(compact('obwodyEdit', 'idObwodu'));
    }

    public function zaktualizuj(Request $aktualizuj, $id){
        $zaktualizujObwod = Obwody::findOrFail($id);
        $zaktualizujObwod->biceps = $aktualizuj->biceps;
        $zaktualizujObwod->klataPiersiowa = $aktualizuj->klataPiersiowa;
        $zaktualizujObwod->talia = $aktualizuj->talia;
        $zaktualizujObwod->pas = $aktualizuj->pas;
        $zaktualizujObwod->biodra = $aktualizuj->biodra;
        $zaktualizujObwod->uda = $aktualizuj->uda;
        $zaktualizujObwod->lydka = $aktualizuj->lydka;
        $zaktualizujObwod->save();

        return redirect()->route('daneDodatkowe');
    }

    public function usunObwody($id){
        Obwody::findOrFail($id)->delete();

        return redirect()->route('daneDodatkowe');
    }

    public function widok(){

        $waga = DB::table('waga')->where('idUzytkownika', '=', Auth::id())->latest('created_at')->first();
        $wzrost = DB::table('wzrost')->where('idUzytkownika', '=', Auth::id())->latest('created_at')->first();
        $obwody = DB::table('obwody')->where('idUzytkownika', '=', Auth::id())->latest('created_at')->first();

        
        return view('daneDodatkowe')->with(compact('waga', 'wzrost', 'obwody'));
    }
}
