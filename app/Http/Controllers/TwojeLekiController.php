<?php

namespace App\Http\Controllers;
use App\lekiUzytkownika;
use Carbon\Carbon;
use Auth;
use DB;
use Illuminate\Http\Request;

function test(){
    $pobierzDaneLeku = DB::table('leki_uzytkownika')
                        ->join('harmonogram_daty', 'leki_uzytkownika.id', '=', 'harmonogram_daty.idLekuUzytkownika')
                        ->select('leki_uzytkownika.*', 'harmonogram_daty.*')->where('idUzytkownika','=',Auth::id())->get();
    
    foreach($pobierzDaneLeku as $daneLeku){
        DB::table('harmonogram')->where('idLekuUzytkownika','=',$daneLeku->id)->delete();
        $rozpoczecie = Carbon::parse($daneLeku->rozpocznij);
        $zakonczenie = Carbon::parse($daneLeku->zakoncz);
        $czasTrwania = $zakonczenie->diffInDays($rozpoczecie);
        $godziny = DB::table('harmonogram_godziny')->select('godzinaPrzyjmowania')->where('idLekuUzytkownika','=',$daneLeku->id)->get();
        $nowaData = $rozpoczecie;
        for($dzien = 0; $dzien < $czasTrwania; $dzien++){
            for($i = 0; $i < count($godziny); $i++){
                DB::table('harmonogram')->insertOrIgnore([
                    'idLekuUzytkownika' => $daneLeku->id,
                    'data' => $nowaData,
                    'godzina' => $godziny[$i]->godzinaPrzyjmowania
                ]);
            }
            $nowaData->addDay()->format('Y-m-d');
        }

    }
    
}

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
        $dodajLek->save();
        $idDodanegoLeku = $dodajLek->id;

        //tworzenie dat do harmonogramu
        if(strlen($dodaj->rozpocznijData) == 0){
            $dataRozpoczecia = Carbon::now()->addDay()->format('Y-m-d');
        }else{
            $dataRozpoczecia = $dodaj->rozpocznijData;
        }

        $jakDlugoPrzyjmowac = ceil($iloscLekuUzytkownika / $dodaj->dawkowanie);

        $dataZakonczenia = Carbon::parse($dataRozpoczecia)->addDays($jakDlugoPrzyjmowac)->format('Y-m-d');

        DB::table('harmonogram_daty')->insert([
            'idLekuUzytkownika' => $idDodanegoLeku,
            'rozpocznij' => $dataRozpoczecia,
            'zakoncz' => $dataZakonczenia
        ]);
        //zakonczenie tworzenia dat harmonogramu
        
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


        test();
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
