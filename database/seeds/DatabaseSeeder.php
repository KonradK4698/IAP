<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    
    public function run()
    {
        
        DB::table('users')->insert([
            'email' => "kwakus18@gmail.com",
            'email_verified_at' => NULL,
            'password' => Hash::make('Kwakus1998'),
            'remember_token' => NULL,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('wzrost')->insert([
            'idUzytkownika' => 1,
            'wzrost' => 187.56,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('obwody')->insert([
            'idUzytkownika' => 1,
            'biceps' => 35,
            'klataPiersiowa' => 96.5,
            'talia' => 100,
            'pas' => 110,
            'biodra' => 105.20,
            'uda' => 40.5,
            'lydka' => 20.5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('cisnienie')->insert([
            'idUzytkownika' => 1,
            'skurczowe' => 80,
            'rozkurczowe' => 120,
            'tetno' => 96,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('dane_uzytkownika')->insert([
            'idUzytkownika' => 1,
            'imie' => "konrad",
            'nazwisko' => "kmak",
            'dataUrodzenia' => Carbon::parse('1998-04-06'),
            'telefon' => 793596826,
            'telefonPomocniczy' => 793596826,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('waga')->insert([
            'idUzytkownika' => 1,
            'waga' => 95.8,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('leki')->insert([
            'nazwa' => "lek pierwszy",
            'zalecaneDawkowanie' => 3,
            'ilosc' => 30,
            'cena' => 125.50,
            'opis' => "lek przeznaczony do spożywania doustnego, w formie tabletek",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('leki')->insert([
            'nazwa' => "lek drugi",
            'zalecaneDawkowanie' => 2,
            'ilosc' => 15,
            'cena' => 12.5,
            'opis' => "lek przeznaczony do spożywania doustnego, pamiętaj o bezpieczeństwie",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('leki')->insert([
            'nazwa' => "lek trzeci",
            'zalecaneDawkowanie' => 4,
            'ilosc' => 150,
            'cena' => 55.99,
            'opis' => "lek przeznaczony do spożywania doustnego, w formie plynnej",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        

    }
}
