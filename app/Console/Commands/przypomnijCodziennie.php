<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Collection;
use Carbon\Carbon;
use App\Harmonogram;
use App\lekiUzytkownika;
use App\Wydarzenia;
use Auth;
use DB;
use App\Mail\Przypomnij;
use Illuminate\Support\Facades\Mail;


function pobierzDane(){
    
        return $posortowane;
}

class przypomnijCodziennie extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'przypomnij:codziennie';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Komenda przypomniająca codziennie rano o nadchodzących czynnościach';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $aktualnaData = Carbon::now()->toDateString();
        $lekUzytownika = DB::table('harmonogram')->select('idLekuUzytkownika','data')->where('data', '=', $aktualnaData)->get();
        
        foreach($lekUzytownika as $idLeku){
           $uzytkownicy = DB::table('leki_uzytkownika')->select('idUzytkownika')->where('id', '=', $idLeku->idLekuUzytkownika)->get();
        }
       
        foreach($uzytkownicy as $uzytkownik){
            $leki = lekiUzytkownika::where('idUzytkownika', '=', $uzytkownik->idUzytkownika)->get();
        $wydarzeniaNaDzis = DB::table('wydarzenia')->where('idUzytkownika', '=', $uzytkownik->idUzytkownika)->where('data', '=', $aktualnaData)->get();
            foreach($leki as $lek){
                $lekiNaDzis = DB::table('harmonogram')->join('leki_uzytkownika', 'harmonogram.idLekuUzytkownika' ,'=','leki_uzytkownika.id')
                                                      ->join('leki', 'leki_uzytkownika.idLeku' ,'=', 'leki.id')->select('harmonogram.*', 'leki.nazwa')->where('leki_uzytkownika.id','=',$lek->id)->where('data', '=', $aktualnaData)->get();
            }

            $posortowane = $lekiNaDzis->sortBy('data');
           Mail::to("inzyniermedic@gmail.com")->send(new Przypomnij($posortowane, $wydarzeniaNaDzis));
        }
        
        return 0;
    }
}
