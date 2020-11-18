<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use App\Cisnienie;

use Illuminate\Http\Request;

class PomiarCisnieniaController extends Controller
{

    public function dodajPomiary(Request $dodaj){

        $walidacja = $dodaj->validate([
            'skurczowe' => 'required|digits_between:1,5|numeric',
            'rozkurczowe' => 'required|digits_between:1,5|numeric',
            'tetno' => 'required|digits_between:1,5|numeric',
        ]);

        $dodajPomiar = new Cisnienie;
        $dodajPomiar->idUzytkownika = Auth::id();
        $dodajPomiar->skurczowe = $dodaj->skurczowe;
        $dodajPomiar->rozkurczowe = $dodaj->rozkurczowe;
        $dodajPomiar->tetno = $dodaj->tetno;
        $dodajPomiar->save();

        return redirect()->route('pomiarCisnienia');
    }

    public function widok(){

        $pomiary = DB::table('cisnienie')->select('skurczowe', 'rozkurczowe', 'tetno')->where('idUzytkownika', '=', Auth::id())->get();
        
        return view('pomiarCisnienia')->with(compact('pomiary'));
    }
}
