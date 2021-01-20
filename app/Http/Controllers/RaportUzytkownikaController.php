<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Auth;
use DB;
use PDF;
use Carbon\Carbon;



class RaportUzytkownikaController extends Controller
{
    
    public function widok(){
        
        if(date('Y-m-d') == Carbon::now()->endOfMonth()->toDateString()){
            $aktualnyMiesiac = Carbon::now()->format('m');
        }else{
            $aktualnyMiesiac = Carbon::now()->format('m') - 1;
        }
        

        return view('raport')->with(compact( 'aktualnyMiesiac'));
    }

    public function utworzPDF($miesiac){
        $rok = Carbon::now()->year;
        $dzienStart = Carbon::createFromDate($rok, (int)$miesiac, 1)->toDateString();
        $ostatniDzien = Carbon::createFromDate($rok, (int)$miesiac, 1)->endOfMonth()->toDateString();
       
        
        $kolekcja=collect();
        $imieNazwisko = DB::table('dane_uzytkownika')->select('imie', 'nazwisko')->where('idUzytkownika','=',Auth::id())->get();
        $przyjeteLeki = DB::table('leki_uzytkownika')->select('id', 'idLeku')->where('idUzytkownika','=',Auth::id())->whereBetween('rozpocznij', [$dzienStart, $ostatniDzien])->get();
       
        foreach($przyjeteLeki as $i => $lekUzytkownika){
            $daneLeku = DB::table('leki')->select('nazwa', 'cena')->where('id', '=',$lekUzytkownika->idLeku)->get();
            $iloscLeku = DB::table('harmonogram')->where('idLekuUzytkownika', '=', $lekUzytkownika->id)->whereBetween('data', [$dzienStart, $ostatniDzien])->count();
            $kolekcja[$i]= ['nazwa'=>$daneLeku->last()->nazwa, 'sztuki'=>$iloscLeku, "cena"=>$daneLeku->last()->cena, "kosztMiesiac"=>$iloscLeku * $daneLeku->last()->cena];
        }
        
        $minWaga = DB::table('waga')->where('idUzytkownika', '=',Auth::id())->whereBetween('created_at', [$dzienStart, $ostatniDzien])->min('waga');
        $maxWaga = DB::table('waga')->where('idUzytkownika', '=',Auth::id())->whereBetween('created_at', [$dzienStart, $ostatniDzien])->max('waga');
        $sredniaWaga = DB::table('waga')->where('idUzytkownika', '=',Auth::id())->whereBetween('created_at', [$dzienStart, $ostatniDzien])->avg('waga');

        $minWzrost = DB::table('wzrost')->where('idUzytkownika', '=',Auth::id())->whereBetween('created_at', [$dzienStart, $ostatniDzien])->min('wzrost');
        $maxWzrost = DB::table('wzrost')->where('idUzytkownika', '=',Auth::id())->whereBetween('created_at', [$dzienStart, $ostatniDzien])->max('wzrost');
        $sredniWzrost = DB::table('wzrost')->where('idUzytkownika', '=',Auth::id())->whereBetween('created_at', [$dzienStart, $ostatniDzien])->avg('wzrost');

        $obwody = DB::table('obwody')->where('idUzytkownika', '=',Auth::id())->whereBetween('created_at', [$dzienStart, $ostatniDzien])->get();
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

        view()->share(compact('imieNazwisko', 'kolekcja', 'obwodyDane'));
        $pdf = PDF::loadView('raportPDF', compact('imieNazwisko', 'kolekcja', 'obwodyDane'));
        
        return $pdf->stream('raport.pdf');

    }
}
