<?php

namespace App\Http\Controllers;
use App\Wzrost;
use Illuminate\Http\Request;
use Auth;
use DB;

class DaneDodatkoweController extends Controller
{
    

    public function dodajWzrost(Request $request){

        $dodaj = new Wzrost;
        $dodaj->idUzytkownika = Auth::id();
        $dodaj->wzrost = $request->wzrost;
        $dodaj->save();

        return redirect()->route('daneDodatkowe');
    }

    public function widok(){
        return view('daneDodatkowe');
    }
}
