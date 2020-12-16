<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use App\Harmonogram;
use App\lekiUzytkownika;
use App\Wydarzenia;
use App\Cisnienie;
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
        return redirect()->route('home');
    }
    public function index()
    {
        $harmonogram = collect();
        $leki = lekiUzytkownika::where('idUzytkownika', '=', Auth::id())->get();
       // $wydarzenia = DB::table('wydarzenia')->where('idUzytkownika', '=', Auth::id())->get();
        foreach($leki as $lek){
            $daneHarmonogram = DB::table('harmonogram')->where('idLekuUzytkownika','=',$lek->id)->get();
        }
        $kolekcja = collect([
            'harmonogram' => $daneHarmonogram,
            //'wydarzenia' => $wydarzenia
        ]);
        foreach($kolekcja as $element){
            foreach($element as $dane){
                $harmonogram->push($dane);
            }
        }
        //dd($harmonogram->sortByDesc('data')->where('data', '2020-12-08'));
        $posortowane = $harmonogram->sortBy('data');
       
        $daneCisnienia = Cisnienie::where('idUzytkownika', '=', 
        Auth::id())->get();
        
        $imieUzytkownika = DB::table('dane_uzytkownika')->select('imie')->where('idUzytkownika', '=', Auth::id())->get();
        
       
        return view('home')->with(compact('posortowane', 'daneCisnienia','imieUzytkownika'));
    }
}
