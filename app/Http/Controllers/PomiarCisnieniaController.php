<?php

namespace App\Http\Controllers;
use Auth;
use App\Cisnienie;

use Illuminate\Http\Request;

class PomiarCisnieniaController extends Controller
{

    public function dodajPomiary(Request $dodaj){
        $dodajPomiar = new Cisnienie;
        $dodajPomiar->idUzytkownika = Auth::id();
        $dodajPomiar->skurczowe = $dodaj->skurczowe;
        $dodajPomiar->rozkurczowe = $dodaj->rozkurczowe;
        $dodajPomiar->tetno = $dodaj->tetno;
        $dodajPomiar->save();

        return redirect()->route('pomiarCisnienia');
    }

    public function widok(){
        return view('pomiarCisnienia');
    }
}