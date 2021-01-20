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
        $aktualnyMiesiac = Carbon::now()->format('m');
        /*if(date('Y-m-d') == Carbon::now()->endOfMonth()->toDateString()){
            $aktualnyMiesiac = Carbon::now()->format('m');
        }else{
            $aktualnyMiesiac = Carbon::now()->format('m') - 1;
        }*/
        

        return view('raport')->with(compact( 'aktualnyMiesiac'));
    }

    public function utworzPDF($miesiac){
        $kosztCalkowity = 0;
        $rok = Carbon::now()->year;
        $dzienStart = Carbon::createFromDate($rok, (int)$miesiac, 1)->toDateString();
        $ostatniDzien = Carbon::createFromDate($rok, (int)$miesiac, 1)->endOfMonth()->toDateString();
       
        
        $kolekcja=collect();
        $imieNazwisko = DB::table('dane_uzytkownika')->select('imie', 'nazwisko')->where('idUzytkownika','=',Auth::id())->get();
        $przyjeteLeki = DB::table('leki_uzytkownika')->select('id', 'idLeku')->where('idUzytkownika','=',Auth::id())->whereBetween('rozpocznij', [$dzienStart, $ostatniDzien])->get();
       
        foreach($przyjeteLeki as $i => $lekUzytkownika){
            $daneLeku = DB::table('leki')->select('nazwa', 'cena','ilosc')->where('id', '=',$lekUzytkownika->idLeku)->get();
            $iloscLeku = DB::table('harmonogram')->where('idLekuUzytkownika', '=', $lekUzytkownika->id)->whereBetween('data', [$dzienStart, $ostatniDzien])->count();
            $kosztLekMiesiac = ($iloscLeku / $daneLeku->last()->ilosc) * $daneLeku->last()->cena;
            $kolekcja[$i]= ['nazwa'=>$daneLeku->last()->nazwa, 'sztuki'=>$iloscLeku, "cena"=>$daneLeku->last()->cena, "kosztMiesiac"=>round($kosztLekMiesiac,2)];
            $kosztCalkowity += $kosztLekMiesiac;
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
            "waga"=>[
                "min"=>$minWaga,
                "avg"=>round($sredniaWaga,2),
                "max"=>$maxWaga
            ],
            "wzrost"=>[
                "min"=>$minWzrost,
                "avg"=>round($sredniWzrost,2),
                "max"=>$maxWzrost
            ],
            "biceps"=>[
                "min"=>$obwody->min('biceps'),
                "avg"=>round($obwody->avg('biceps'),2),
                "max"=>$obwody->max('biceps')
            ],
            'klatka'=>[
                "min"=>$obwody->min('klataPiersiowa'),
                "avg"=>round($obwody->avg('klataPiersiowa'),2),
                "max"=>$obwody->max('klataPiersiowa')
            ],
            'talia'=>[
                "min"=>$obwody->min('talia'),
                "avg"=>round($obwody->avg('talia'),2),
                "max"=>$obwody->max('talia')
            ],
            'pas'=>[
                "min"=>$obwody->min('pas'),
                "avg"=>round($obwody->avg('pas'),2),
                "max"=>$obwody->max('pas')
            ],
            'biodra'=>[
                "min"=>$obwody->min('biodra'),
                "avg"=>round($obwody->avg('biodra'),2),
                "max"=>$obwody->max('biodra')
            ],
            'uda'=>[
                "min"=>$obwody->min('uda'),
                "avg"=>round($obwody->avg('uda'),2),
                "max"=>$obwody->max('uda')
            ],
            'lydka'=>[
                "min"=>$obwody->min('lydka'),
                "avg"=>round($obwody->avg('lydka'),2),
                "max"=>$obwody->max('lydka')
            ],

        ]);

        $cisnienie = DB::table('cisnienie')->where('idUzytkownika', '=',Auth::id())->whereBetween('created_at', [$dzienStart, $ostatniDzien])->get();
        $cisnienieDane = collect();

        $cisnienieDane=([
            "skurczowe"=>[
                "min"=>$cisnienie->min('skurczowe'),
                "avg"=>round($cisnienie->avg('skurczowe')),
                "max"=>$cisnienie->max('skurczowe')
            ],
            "rozkurczowe"=>[
                "min"=>$cisnienie->min('rozkurczowe'),
                "avg"=>round($cisnienie->avg('rozkurczowe')),
                "max"=>$cisnienie->max('rozkurczowe')
            ],
            "tetno"=>[
                "min"=>$cisnienie->min('tetno'),
                "avg"=>round($cisnienie->avg('tetno')),
                "max"=>$cisnienie->max('tetno')
            ],

        ]);
        
        view()->share(compact('imieNazwisko', 'kolekcja', 'obwodyDane','cisnienieDane','kosztCalkowity' ));
        $pdf = PDF::loadView('raportPDF', compact('imieNazwisko', 'kolekcja', 'obwodyDane','cisnienieDane','kosztCalkowity' ));
        
        return $pdf->stream('raport.pdf');

    }
}
