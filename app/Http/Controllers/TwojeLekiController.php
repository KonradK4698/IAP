<?php

namespace App\Http\Controllers;
use App\lekiUzytkownika;
use Auth;
use DB;
use Illuminate\Http\Request;

class TwojeLekiController extends Controller
{
    public function dodajLek(Request $dodaj){

        $walidacja = $dodaj->validate([
            'idLeku' => 'required|numeric',
            'iloscPaczek' => 'required|numeric',
        ]);

        $idLeku = $dodaj->idLeku;
        $dawkaUzytkownika =  $dodaj->dawkowanie;
        $iloscPaczek = $dodaj->iloscPaczek;

        $dodajLek = new lekiUzytkownika;
        $dodajLek->idUzytkownika = Auth::id();
        $dodajLek->idLeku = $idLeku;
        $dodajLek->iloscPaczek = $iloscPaczek;

        if(strlen($dawkaUzytkownika) == 0){
            $dawkaSugerowana = DB::table('leki')->select('zalecaneDawkowanie')->where('id', '=', $idLeku)->get();
            $dodajLek->dawkowanie = $dawkaSugerowana->first()->zalecaneDawkowanie;
        }else{
            $dodajLek->dawkowanie = $dawkaUzytkownika;
        }
        
        $iloscLeku = DB::table('leki')->select('ilosc')->where('id', '=', $idLeku)->get();
        $iloscLekuUzytkownika = $iloscLeku->first()->ilosc * $iloscPaczek;
        $dodajLek->iloscLeku =  $iloscLekuUzytkownika;

        $dodajLek->czestotliwosc = $dodaj->czestotliwosc;
        $dodajLek->save();
        return redirect()->route('twojeLeki');
    }

    public function widok(){

        $wybierzLek = DB::table('leki')->select('id', 'nazwa')->get();

        return view('twojeLeki')->with(compact('wybierzLek'));
    }
}
