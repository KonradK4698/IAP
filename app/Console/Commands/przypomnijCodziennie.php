<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Collection;
use Carbon\Carbon;
use App\lekiUzytkownika;
use App\Users;
use DB;
use App\Mail\Przypomnij;
use Illuminate\Support\Facades\Mail;

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
        $lekiTablica = array();
        $uzytkownicy = DB::table('users')->select('id','email')->get();
        foreach($uzytkownicy as $uzytkownik){
            $leki = DB::table('leki_uzytkownika')->select('id')->where('idUzytkownika', '=', $uzytkownik->id)->get();
            
            foreach($leki as $numer=>$lek){
                $lekiTablica[$numer] = $lek->id;
            }
            $nadchodzaceWydarzenia = DB::table('wydarzenia')->where('idUzytkownika', '=', $uzytkownik->id)
                                    ->whereBetween('data',[$aktualnaData, Carbon::now()->addDays(7)->toDateString()])->get();
            
            $lekiNaDzis = DB::table('harmonogram')
                            ->join('leki_uzytkownika', 'harmonogram.idLekuUzytkownika' ,'=','leki_uzytkownika.id')
                            ->join('leki', 'leki_uzytkownika.idLeku' ,'=', 'leki.id')->select('harmonogram.*', 'leki.nazwa')
                            ->whereIn('harmonogram.idLekuUzytkownika',$lekiTablica)->where('harmonogram.data','=',$aktualnaData)->get();
            $posortowane = $lekiNaDzis->sortBy('godzina');    
            if($posortowane->count() > 0 || $nadchodzaceWydarzenia->count() > 0){
           Mail::to($uzytkownik->email)->send(new Przypomnij($posortowane, $nadchodzaceWydarzenia));
            }
        }
        
        return 0;
    }
}
