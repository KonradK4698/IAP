<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Auth;
use DB;


class RaportUzytkownikaController extends Controller
{
    public function widok(){
        $kolekcja=collect();
        $imieNazwisko = DB::table('dane_uzytkownika')->select('imie', 'nazwisko')->where('idUzytkownika','=',Auth::id())->get();
        $przyjeteLeki = DB::table('leki_uzytkownika')->select('id', 'idLeku')->where('idUzytkownika','=',Auth::id())->get();
        
        foreach($przyjeteLeki as $i => $lekUzytkownika){
            $daneLeku = DB::table('leki')->select('nazwa', 'cena')->where('id', '=',$lekUzytkownika->idLeku)->get();
            $iloscLeku = DB::table('harmonogram')->where('idLekuUzytkownika', '=', $lekUzytkownika->id)->whereBetween('data', ["2020-12-01", "2020-12-31"])->count();
            $kolekcja[$i]= ['nazwa'=>$daneLeku->last()->nazwa, 'sztuki'=>$iloscLeku, "cena"=>$daneLeku->last()->cena, "kosztMiesiac"=>$iloscLeku * $daneLeku->last()->cena];
        }
        
        $minWaga = DB::table('waga')->where('idUzytkownika', '=',Auth::id())->whereBetween('created_at', ["2020-12-01", "2020-12-31"])->min('waga');
        $maxWaga = DB::table('waga')->where('idUzytkownika', '=',Auth::id())->whereBetween('created_at', ["2020-12-01", "2020-12-31"])->max('waga');
        $sredniaWaga = DB::table('waga')->where('idUzytkownika', '=',Auth::id())->whereBetween('created_at', ["2020-12-01", "2020-12-31"])->avg('waga');

        $minWzrost = DB::table('wzrost')->where('idUzytkownika', '=',Auth::id())->whereBetween('created_at', ["2020-12-01", "2020-12-31"])->min('wzrost');
        $maxWzrost = DB::table('wzrost')->where('idUzytkownika', '=',Auth::id())->whereBetween('created_at', ["2020-12-01", "2020-12-31"])->max('wzrost');
        $sredniWzrost = DB::table('wzrost')->where('idUzytkownika', '=',Auth::id())->whereBetween('created_at', ["2020-12-01", "2020-12-31"])->avg('wzrost');

        $obwody = DB::table('obwody')->where('idUzytkownika', '=',Auth::id())->whereBetween('created_at', ["2020-12-01", "2020-12-31"])->get();
        $obwodyDane = collect();

        $obwodyDane=([
            "biceps"=>[
                "min"=>$obwody->min('biceps'),
                "max"=>$obwody->max('biceps')
            ],
            'klatka'=>[
                "min"=>$obwody->min('klataPiersiowa'),
                "max"=>$obwody->max('klataPiersiowa')
            ],
            'talia'=>[
                "min"=>$obwody->min('talia'),
                "max"=>$obwody->max('talia')
            ],
            'pas'=>[
                "min"=>$obwody->min('pas'),
                "max"=>$obwody->max('pas')
            ],
            'biodra'=>[
                "min"=>$obwody->min('biodra'),
                "max"=>$obwody->max('biodra')
            ],
            'uda'=>[
                "min"=>$obwody->min('uda'),
                "max"=>$obwody->max('uda')
            ],
            'lydka'=>[
                "min"=>$obwody->min('lydka'),
                "max"=>$obwody->max('lydka')
            ],

        ]);

        return view('raport')->with(compact('imieNazwisko', 'kolekcja', 'obwodyDane'));
    }
}
