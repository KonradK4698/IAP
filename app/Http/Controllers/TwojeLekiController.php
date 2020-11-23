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

    public function usunLek($id){
        lekiUzytkownika::findOrFail($id)->delete();
        return redirect()->route('twojeLeki');
    }

    public function dodajOpakowanie(Request $dodaj, $id, $idLeku){
        $iloscOpakowan = $dodaj->ilosc;

        $stareDane = DB::table('leki_uzytkownika')->select('iloscPaczek', 'iloscLeku')->where('id','=',$id)->get();
        $szutkWPaczce = DB::table('leki')->select('ilosc')->where('id','=',$idLeku)->get();

        $nowaIloscOpakowan = $iloscOpakowan + $stareDane->first()->iloscPaczek;
        $nowaIloscSztuk = $iloscOpakowan * $szutkWPaczce->first()->ilosc + $stareDane->first()->iloscLeku;

        lekiUzytkownika::Where('id', '=', $id)->update(['iloscPaczek'=> $nowaIloscOpakowan, 'iloscLeku'=> $nowaIloscSztuk]);
        return redirect()->route('twojeLeki');
    }

    public function dodajLekiNaSztuki(Request $dodaj, $id, $idLeku){
        $iloscSztuk = $dodaj->iloscSztuk;

        $stareDane = DB::table('leki_uzytkownika')->select('iloscPaczek', 'iloscLeku')->where('id','=',$id)->get();
        $szutkWPaczce = DB::table('leki')->select('ilosc')->where('id','=',$idLeku)->get();

        $nowaIloscSztuk = $stareDane->first()->iloscLeku + $iloscSztuk;
        $nowaIloscOpakowan = ceil($nowaIloscSztuk / $szutkWPaczce->first()->ilosc);

        

        lekiUzytkownika::Where('id', '=', $id)->update(['iloscPaczek'=> $nowaIloscOpakowan,'iloscLeku' => $nowaIloscSztuk]);

        return redirect()->route('twojeLeki');

    }

    public function widok(){

        $wybierzLek = DB::table('leki')->select('id', 'nazwa')->get();
        $lekiUzytkownika = DB::table('leki_uzytkownika')
                            ->join('leki', 'leki_uzytkownika.idLeku', '=','leki.id')
                            ->select('leki_uzytkownika.*', 'leki.nazwa')
                            ->where('idUzytkownika', '=', Auth::id())->get();
        
        return view('twojeLeki')->with(compact('wybierzLek', 'lekiUzytkownika'));
    }
}
