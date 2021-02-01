<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use App\Harmonogram;
use App\Wydarzenia;
use App\Cisnienie;
use App\Waga;
use App\Wzrost;
use App\Obwody;
use App\lekiUzytkownika;
use Auth;
use DB;
use daneUzytkownika;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function przyjmijLek($id){
        Harmonogram::findOrFail($id)->update(['potwierdzenie'=>1]);
        $idLeku = DB::table('harmonogram')->select('idLekuUzytkownika')->where('id','=',$id)->first();
        DB::table('leki_uzytkownika')->where('id','=',$idLeku->idLekuUzytkownika)->decrement('iloscLeku');
        return redirect()->route('home');
    }
    public function index()
    {
        
        $aktualnaWaga = Waga::where('idUzytkownika','=',Auth::id())->orderByDesc('created_at')->first();
        $aktualnyWzrost = Wzrost::where('idUzytkownika','=',Auth::id())->orderByDesc('created_at')->first();
        $aktualneObwody = Obwody::where('idUzytkownika','=',Auth::id())->orderByDesc('created_at')->first();
        $harmonogramLekow = DB::table("leki_uzytkownika")
                                ->join('leki', 'leki_uzytkownika.idLeku','=','leki.id')
                                ->join('harmonogram','leki_uzytkownika.id','=','harmonogram.idLekuUzytkownika')
                                ->select( 'leki.nazwa','harmonogram.id','harmonogram.data', 'harmonogram.godzina')->where('leki_uzytkownika.idUzytkownika','=',Auth::id())
                                ->where('data','=',Carbon::now()->format('Y-m-d'))->where('harmonogram.potwierdzenie','=',0)->orderBy('godzina')->get();
        
        $statyskaLekow = DB::table('leki_uzytkownika')->join('leki', 'leki_uzytkownika.idLeku', '=', 'leki.id')->select('leki_uzytkownika.*', 'leki.nazwa')->where('leki_uzytkownika.idUzytkownika', '=', Auth::id())->get();
       
        $dataTydzien = Carbon::now()->subDays(7)->toDateTimeString();
        $daneCisnienia = DB::table('cisnienie')->where('idUzytkownika', '=', Auth::id())->whereBetween('created_at',[$dataTydzien, Carbon::now()->toDateTimeString()])->orderByDesc('created_at')->get();
        
        $imieUzytkownika = DB::table('dane_uzytkownika')->select('imie')->where('idUzytkownika', '=', Auth::id())->get();
        $aktualnaData = Carbon::now()->format('Y-m-d');
        $końcowaData = Carbon::now()->addDays(7)->format('Y-m-d');
        $najblizszeWydarzenia = Wydarzenia::where('idUzytkownika','=',Auth::id())->whereBetween('data',[$aktualnaData, $końcowaData])->get();
       
        return view('home')->with(compact('daneCisnienia','imieUzytkownika','statyskaLekow','harmonogramLekow'))
                           ->with(compact('aktualnaWaga','aktualnyWzrost','aktualneObwody', 'najblizszeWydarzenia'));
    }
}
