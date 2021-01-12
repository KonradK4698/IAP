<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use App\Cisnienie;
use Carbon\Carbon;

use Illuminate\Http\Request;

class PomiarCisnieniaController extends Controller
{

    public function dodajPomiary(Request $dodaj){

        $walidacja = $dodaj->validate([
            'skurczowe' => 'required|numeric',
            'rozkurczowe' => 'required|numeric',
            'tetno' => 'required|numeric',
        ]);

        $dodajPomiar = new Cisnienie;
        $dodajPomiar->idUzytkownika = Auth::id();
        $dodajPomiar->skurczowe = $dodaj->skurczowe;
        $dodajPomiar->rozkurczowe = $dodaj->rozkurczowe;
        $dodajPomiar->tetno = $dodaj->tetno;
        $dodajPomiar->save();

        return redirect()->route('pomiarCisnienia');
    }

    public function usunPomiary($id){
        Cisnienie::findOrFail($id)->delete();
        return redirect()->route('pomiarCisnienia');
    }

    public function widok(){
        $aktualnaData = Carbon::now()->format('Y-m-d');

        $pomiary = DB::table('cisnienie')->select('id','skurczowe', 'rozkurczowe', 'tetno', 'created_at')->where('idUzytkownika', '=', Auth::id())->whereDate('created_at', '=', $aktualnaData)->get();

        return view('pomiarCisnienia')->with(compact('pomiary'));
    }
}
