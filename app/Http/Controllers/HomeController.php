<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Harmonogram;
use App\lekiUzytkownika;
use App\Wydarzenia;
use Auth;
use DB;
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
        $harmonogram = [];
        $i=0;
        $leki = lekiUzytkownika::where('idUzytkownika', '=', Auth::id())->get();
        $wydarzenia = Wydarzenia::where('idUzytkownika', '=', Auth::id())->get();
        foreach($leki as $lek){
            $daneHarmonogram = DB::table('harmonogram')->where('idLekuUzytkownika','=',$lek->id)->get();
            foreach($daneHarmonogram as $dana){
                $harmonogram[$i] = $dana;
                $i++;
            }
        }
        
        return view('home')->with(compact('harmonogram', 'wydarzenia'));
    }
}
