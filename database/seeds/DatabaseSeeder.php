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
            'email' => "admin@admin.com",
            'email_verified_at' => NULL,
            'password' => Hash::make('Admin'),
            'remember_token' => NULL,
            'isAdmin' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);



        DB::table('leki')->insert([
            'nazwa' => "Euthyrox",
            'zalecaneDawkowanie' => 1,
            'ilosc' => 100,
            'cena' => 8.16,
            'opis' => "Euthyrox jest hormonem. Sotosowany w leczeniu zastępczym niedoczynności tarczycy",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('leki')->insert([
            'nazwa' => "Acard",
            'zalecaneDawkowanie' => 1,
            'ilosc' => 30,
            'cena' => 8.28,
            'opis' => "Lek dostępny bez recepty. Lek hamujący agregację płytek krwi",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('leki')->insert([
            'nazwa' => "Letrox",
            'zalecaneDawkowanie' => 1,
            'ilosc' => 50,
            'cena' => 6.52,
            'opis' => "Lek dostępny na receptę. Hromon. Terapia zastępcza i uzupełniająca w niedoczynności tarczycy o różnej etiologii.",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('leki')->insert([
            'nazwa' => "Clonazepamum 0.5mg",
            'zalecaneDawkowanie' => 1,
            'ilosc' => 30,
            'cena' => 5.16,
            'opis' => "Lek dostępny na receptę. Pochodna benzodiazepiny. Leczenie padaczki u dorosłych i dzieci",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        

    }
}
