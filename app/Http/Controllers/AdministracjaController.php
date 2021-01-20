<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\lekiUzytkownika;
use App\Waga;
use App\Obwody;
use App\Wzrost;
use App\Wydarzenia;
use App\daneUzytkownika;
class AdministracjaController extends Controller
{

    public function edytujUzytkownika($id){
        $email = DB::table('users')->select('email')->where('id','=',$id)->first();
        $daneOsobowe = DB::table('dane_uzytkownika')->where('idUzytkownika', '=', $id)->get();
        $lekiU = DB::table('leki_uzytkownika')->join('leki', 'leki.id', '=','leki_uzytkownika.idLeku')->select('leki.nazwa', 'leki_uzytkownika.id', 'leki_uzytkownika.created_at')->where('leki_uzytkownika.idUzytkownika','=',$id)->get();
        $wagiU = Waga::where('idUzytkownika','=',$id)->get();
        $obwodyU = Obwody::where('idUzytkownika','=',$id)->get();
        $wzrostU = Wzrost::where('idUzytkownika','=',$id)->get();
        $wydarzeniaU = Wydarzenia::where('idUzytkownika','=',$id)->get();

        return view('administracja.edycjaUzytkownika')->with(compact('daneOsobowe', 'lekiU', 'wagiU', 'obwodyU', 'wzrostU', 'wydarzeniaU', 'email'));
    }

    public function usunWydarzenieUzytkownika($wydarzenieID){
        Wydarzenia::findOrFail($wydarzenieID)->delete();
        return redirect()->back();
    }

    public function usunLekUzytkownika($lekID){
        lekiUzytkownika::findOrFail($lekID)->delete();
        return redirect()->back();
    }

    public function edytujObwodyUzytkownika($obwodyID){
        $obwody = Obwody::findOrFail($obwodyID)->first();
        return view('administracja.edycjaObwodowUzytkownika')->with(compact('obwody','obwodyID'));
    }

    public function edytujObwodyUzytkownikaPost(Request $dane, $obwodyID){
        $zmienDane = Obwody::findOrFail($obwodyID);
        $zmienDane->biceps = $dane->biceps;
        $zmienDane->klataPiersiowa = $dane->klataPiersiowa;
        $zmienDane->talia = $dane->talia;
        $zmienDane->pas = $dane->pas;
        $zmienDane->biodra = $dane->biodra;
        $zmienDane->uda = $dane->uda;
        $zmienDane->lydka = $dane->lydka;
        $zmienDane->save();

        return redirect()->back();
    }
    public function usunObwodyUzytkownika($obwodyID){
        Obwody::findOrFail($obwodyID)->delete();
        return redirect()->back();
    }

    public function edytujWzrostUzytkownika($wzrostID){
        $wzrost = Wzrost::findOrFail($wzrostID)->first();
        return view('administracja.edycjaWzrostuUzytkownika')->with(compact('wzrost','wzrostID'));
    }

    public function edytujWzrostUzytkownikaPost(Request $dane, $wzrostID){
        $zmienDane = Wzrost::findOrFail($wzrostID);
        $zmienDane->wzrost = $dane->wzrost;
        $zmienDane->save();

        return redirect()->back();
    }
    public function usunWzrostUzytkownika($wzrostID){
        Wzrost::findOrFail($wzrostID)->delete();
        return redirect()->back();
    }

    public function edytujWageUzytkownika($wagaID){
        $waga = Waga::findOrFail($wagaID)->first();
        return view('administracja.edycjaWagiUzytkownika')->with(compact('waga','wagaID'));
    }

    public function edytujWageUzytkownikaPost(Request $dane, $wagaID){
        $zmienDane = Waga::findOrFail($wagaID);
        $zmienDane->waga = $dane->waga;
        $zmienDane->save();

        return redirect()->back();
    }
    public function usunWageUzytkownika($wagaID){
        Waga::findOrFail($wagaID)->delete();
        return redirect()->back();
    }

    public function edytujDaneUzytkownika($daneID){
        $dane = daneUzytkownika::findOrFail($daneID)->first();
        return view('administracja.edycjaDanychUzytkownika')->with(compact('dane','daneID'));
    }

    public function edytujDaneUzytkownikaPost(Request $dane, $daneID){
        $zmienDane = daneUzytkownika::findOrFail($daneID);
        $zmienDane->imie = $dane->imie;
        $zmienDane->nazwisko = $dane->nazwisko;
        $zmienDane->dataUrodzenia = $dane->dataUrodzenia;
        $zmienDane->telefon = $dane->telefon;
        $zmienDane->telefonPomocniczy = $dane->telefonPom;
        $zmienDane->save();

        return redirect()->back();
    }
    public function usunDaneUzytkownika($daneID){
        daneUzytkownika::findOrFail($daneID)->delete();
        return redirect()->back();
    }


    public function widok(){

        $uzytkownicy = DB::table('users')->join('dane_uzytkownika','dane_uzytkownika.idUzytkownika', '=','users.id')->select('users.id', 'dane_uzytkownika.imie', 'users.email')->get();
        $lekiDoPotwierdzenia = DB::table('leki')->where('potwierdzenieAdmina', '=', 0)->get();

        return view('administracja.panel')->with(compact('uzytkownicy','lekiDoPotwierdzenia'));
    }
}
