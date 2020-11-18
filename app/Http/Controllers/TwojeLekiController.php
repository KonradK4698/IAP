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
            'iloscLeku' => 'required|numeric',
            'dawkowanie' => 'required|numeric',
        ]);


        $dodajLek = new lekiUzytkownika;
        $dodajLek->idUzytkownika = Auth::id();
        $dodajLek->idLeku = $dodaj->idLeku;
        $dodajLek->iloscPaczek = $dodaj->iloscPaczek;
        $dodajLek->iloscLeku = $dodaj->iloscLeku;
        $dodajLek->dawkowanie = $dodaj->dawkowanie;
        $dodajLek->save();

        return redirect()->route('twojeLeki');
    }

    public function widok(){

        $wybierzLek = DB::table('leki')->select('id', 'nazwa')->get();

        return view('twojeLeki')->with(compact('wybierzLek'));
    }
}
