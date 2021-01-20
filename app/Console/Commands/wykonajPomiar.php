<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use DB;
use App\Mail\cisnienieMail;
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
        $uzytkownicy = DB::table('cisnienie')->select('idUzytkownika')->where('created_at','=', $aktualnaData);
        return 0;
    }
}
