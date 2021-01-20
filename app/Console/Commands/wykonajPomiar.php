<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use DB;
use Carbon\Carbon;
use App\Mail\cisnienieMail;
use Illuminate\Support\Facades\Mail;
class wykonajPomiar extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'przypomnij:pomiar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Przypomnienie o pomiarze ciśnienia';

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
        $dataDoSprawdzenia1 = Carbon::createFromFormat('Y-m-d H:i:s', $aktualnaData.'00:00:00')->toDateTimeString();
        $dataDoSprawdzenia2 = Carbon::createFromFormat('Y-m-d H:i:s', $aktualnaData.'15:00:00')->toDateTimeString();
        $uzytkownicy = DB::table('users')->select('id','email')->get();
        foreach($uzytkownicy as $uzytkownik){
            $pomiar = DB::table('cisnienie')->where('idUzytkownika','=',$uzytkownik->id)->whereBetween('created_at',[$dataDoSprawdzenia1, $dataDoSprawdzenia2])->count();
            if($pomiar > 0){
                Mail::to($uzytkownik->email)->send(new cisnienieMail());
            }
        }
        
        return 0;
    }
}
