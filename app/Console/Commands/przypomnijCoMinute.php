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
use App\Mail\przypomnijLeki;
use Illuminate\Support\Facades\Mail;

class przypomnijCoMinute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'przypomnij:cominute';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Komenda tworząca przypomnienie 30 minut przed wydarzeniem';

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
        $lekiTablica = array();
        $uzytkownicy = DB::table('users')->select('id','email')->get();
        foreach($uzytkownicy as $uzytkownik){
            $leki = lekiUzytkownika::where('idUzytkownika', '=', $uzytkownik->id)->get();
            foreach($leki as $numer=>$lek){
                $lekiTablica[$numer] = $lek->id;
            }
            $nadchodzaceWydarzenia = DB::table('wydarzenia')->where('idUzytkownika', '=', $uzytkownik->id)->where('data','=',$aktualnaData)
            ->whereBetween('godzina', [Carbon::now('Europe/Warsaw')->addMinutes(30)->toTimeString(), Carbon::now('Europe/Warsaw')->addMinutes(32)->toTimeString()])->get();
            $aktualnyLek = DB::table('harmonogram')->join('leki_uzytkownika', 'harmonogram.idLekuUzytkownika' ,'=','leki_uzytkownika.id')
                                                      ->join('leki', 'leki_uzytkownika.idLeku' ,'=', 'leki.id')->select('harmonogram.*', 'leki.nazwa')
                                                      ->whereIn('harmonogram.idLekuUzytkownika',$lekiTablica)->where('harmonogram.data','=',$aktualnaData)
                                                      ->whereBetween('harmonogram.godzina', [Carbon::now('Europe/Warsaw')->addMinutes(30)->toTimeString(), Carbon::now('Europe/Warsaw')->addMinutes(35)->toTimeString()])->get();
            

            
            
            
            if($aktualnyLek->count() > 0 || $nadchodzaceWydarzenia->count() > 0){
                Mail::to($uzytkownik->email)->send(new przypomnijLeki($aktualnyLek, $nadchodzaceWydarzenia));
            }
           
        }
    }
}
