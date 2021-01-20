<?php

namespace App\Http\Controllers;
use App\lekiUzytkownika;
use App\Harmonogram;

use Carbon\Carbon;
use Auth;
use DB;
use Illuminate\Http\Request;


function harmonogram($idDodanegoLeku){
        $pobierzDaneLeku = DB::table('leki_uzytkownika')->where('id','=',$idDodanegoLeku)->get();

        $nowaData = Carbon::parse($pobierzDaneLeku->first()->rozpocznij);
        $iloscLeku = $pobierzDaneLeku->first()->iloscLeku;
        $dawkowanie = $pobierzDaneLeku->first()->dawkowanie;
        $i = 0;
        $godziny = DB::table('harmonogram_godziny')->select('godzinaPrzyjmowania')->where('idLekuUzytkownika','=',$idDodanegoLeku)->get();
        $godzinaStart = $godziny->first()->godzinaPrzyjmowania;
        $polnoc = Carbon::parse("23:59:59")->format('H:i:s');
        do{
                if(Carbon::parse($godziny[$i]->godzinaPrzyjmowania)->between($godzinaStart, $polnoc)){
                    Harmonogram::firstOrCreate([
                    'idLekuUzytkownika' => $idDodanegoLeku,
                    'data' => $nowaData,
                    'godzina' => $godziny[$i]->godzinaPrzyjmowania
                ]);
                }else{
                    $copyDate = clone $nowaData;
                    $dateTmp = $copyDate->addDay()->format('Y-m-d');
                    Harmonogram::firstOrCreate([
                    'idLekuUzytkownika' => $idDodanegoLeku,
                    'data' => $dateTmp,
                    'godzina' => $godziny[$i]->godzinaPrzyjmowania
                    ]);
                }
            if($i == $dawkowanie-1){
                $i =0;
                $nowaData->addDay()->format('Y-m-d');
            }else{
                $i++;
            }
            $iloscLeku--;

        }while($iloscLeku > 0);
}

class TwojeLekiController extends Controller
{
    
    public function dodajLek(Request $dodaj){

        $walidacja = $dodaj->validate([
            'idLeku' => 'required|numeric',
            'iloscPaczek' => 'required|numeric',
            'dawkowanie' => 'required|numeric',
            'czestotliwosc' => 'required|numeric',
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
            $dawkowanie = $dawkaSugerowana->first()->zalecaneDawkowanie;
            $dodajLek->dawkowanie = $dawkowanie;
        }else{
            $dawkowanie = $dawkaUzytkownika;
            $dodajLek->dawkowanie = $dawkowanie;
        }
        
        $iloscLeku = DB::table('leki')->select('ilosc')->where('id', '=', $idLeku)->get();
        $iloscLekuUzytkownika = $iloscLeku->first()->ilosc * $iloscPaczek;
        $dodajLek->iloscLeku =  $iloscLekuUzytkownika;
        $dodajLek->czestotliwosc = $dodaj->czestotliwosc;

        //tworzenie dat do harmonogramu
        if(strlen($dodaj->rozpocznijData) == 0){
            $dataRozpoczecia = Carbon::now()->addDay()->format('Y-m-d');
        }else{
            $dataRozpoczecia = $dodaj->rozpocznijData;
        }

        $jakDlugoPrzyjmowac = floor($iloscLekuUzytkownika / $dodaj->dawkowanie);

        $dataZakonczenia = Carbon::parse($dataRozpoczecia)->addDays($jakDlugoPrzyjmowac)->format('Y-m-d');

        $dodajLek->rozpocznij = $dataRozpoczecia;
        $dodajLek->zakoncz = $dataZakonczenia;
        //zakonczenie tworzenia dat harmonogramu

        $dodajLek->save();
        $idDodanegoLeku = $dodajLek->id;

        

        
        
        //utworzenie godzin przyjmowania leków
        $godzinyPrzyjmowania = [];
        if(strlen($dodaj->rozpocznij) == 0){
            $godzinaRozpoczecia = Carbon::parse("8:00");
        }else{
            $godzinaRozpoczecia = $dodaj->rozpocznij;
        }
        
        for($i = 0; $i < $dawkowanie; $i++ ){
            $dodajCzas = $dodaj->czestotliwosc * $i;
            $godzinyPrzyjmowania[$i] = Carbon::parse($godzinaRozpoczecia)->addHours($dodajCzas)->format('H:i:s');
        }

        foreach($godzinyPrzyjmowania as $godzina){
            DB::table('harmonogram_godziny')->insert([
                'idLekuUzytkownika' => $idDodanegoLeku,
                'godzinaPrzyjmowania' => $godzina
            ]);
        }
        //koniec tworzenia godzin przyjmowania leków


        harmonogram($idDodanegoLeku);
        

        return redirect()->route('twojeLeki');
        
    }

    

    public function usunLek($id){
        lekiUzytkownika::findOrFail($id)->delete();
        return redirect()->route('twojeLeki');
    }

    public function dodajOpakowanie(Request $dodaj, $id, $idLeku){
        $iloscOpakowan = $dodaj->ilosc;

        $stareDane = DB::table('leki_uzytkownika')->select('iloscPaczek', 'iloscLeku', 'rozpocznij', 'dawkowanie')->where('id','=',$id)->get();
        $szutkWPaczce = DB::table('leki')->select('ilosc')->where('id','=',$idLeku)->get();

        $nowaIloscOpakowan = $iloscOpakowan + $stareDane->first()->iloscPaczek;
        $nowaIloscSztuk = $iloscOpakowan * $szutkWPaczce->first()->ilosc + $stareDane->first()->iloscLeku;

        $dataRozpoczecia = $stareDane->first()->rozpocznij;
        $dawkowanie = $stareDane->first()->dawkowanie;
        $jakDlugoPrzyjmowac = floor($nowaIloscSztuk / $dawkowanie);
        $nowaDataZakonczenia = Carbon::parse($dataRozpoczecia)->addDays($jakDlugoPrzyjmowac)->format('Y-m-d');
        
        //dd($dataRozpoczecia , $nowaDataZakonczenia);
        
        lekiUzytkownika::Where('id', '=', $id)->update(['iloscPaczek'=> $nowaIloscOpakowan, 'iloscLeku'=> $nowaIloscSztuk, 'zakoncz'=>$nowaDataZakonczenia]);
        harmonogram($id);
        return redirect()->route('twojeLeki');
    }

    public function dodajLekiNaSztuki(Request $dodaj, $id, $idLeku){
        $iloscSztuk = $dodaj->iloscSztuk;

        $stareDane = DB::table('leki_uzytkownika')->select('iloscPaczek', 'iloscLeku', 'rozpocznij', 'dawkowanie')->where('id','=',$id)->get();
        $szutkWPaczce = DB::table('leki')->select('ilosc')->where('id','=',$idLeku)->get();

        $nowaIloscSztuk = $stareDane->first()->iloscLeku + $iloscSztuk;
        $nowaIloscOpakowan = ceil($nowaIloscSztuk / $szutkWPaczce->first()->ilosc);

        $dataRozpoczecia = $stareDane->first()->rozpocznij;
        $dawkowanie = $stareDane->first()->dawkowanie;
        $jakDlugoPrzyjmowac = floor($nowaIloscSztuk / $dawkowanie);
        $nowaDataZakonczenia = Carbon::parse($dataRozpoczecia)->addDays($jakDlugoPrzyjmowac)->format('Y-m-d');

        lekiUzytkownika::where('id', '=', $id)->update(['iloscPaczek'=> $nowaIloscOpakowan,'iloscLeku' => $nowaIloscSztuk, 'zakoncz'=>$nowaDataZakonczenia]);
        harmonogram($id);
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
