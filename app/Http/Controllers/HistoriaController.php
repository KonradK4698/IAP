<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Waga;
use App\Wzrost;
use App\Cisnienie;
use App\Obwody;
use App\Harmonogram;
use App\Wydarzenia;
use Auth;
use DB;
use Carbon\Carbon;
class HistoriaController extends Controller
{
    public function widok(){
        $historiaWag = Waga::where('idUzytkownika','=',Auth::id())->where('created_at','<=', now())->orderBy('created_at')->get();
        $historiaWzrostu = Wzrost::where('idUzytkownika','=',Auth::id())->where('created_at','<=', now())->get();
        $historiaObwody = Obwody::where('idUzytkownika','=',Auth::id())->where('created_at','<=', now())->get();
        $historiaCisnienie = Cisnienie::where('idUzytkownika','=',Auth::id())->where('created_at','<=', now())->get();
        $historiaWydarzenia = DB::table('wydarzenia')->where('idUzytkownika','=',Auth::id())->where('data','<=', now())->get();

        $historiaLekow = DB::table("leki_uzytkownika")
                                ->join('leki', 'leki_uzytkownika.idLeku','=','leki.id')
                                ->join('harmonogram','leki_uzytkownika.id','=','harmonogram.idLekuUzytkownika')
                                ->select( 'leki.nazwa','harmonogram.*')->where('leki_uzytkownika.idUzytkownika','=',Auth::id())->orderBy('godzina')->get();

        return view('historia')->with(compact('historiaWag','historiaWzrostu','historiaObwody','historiaCisnienie','historiaWydarzenia','historiaLekow'));
    }
}
