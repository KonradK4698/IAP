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
        DB::table('leki')->insert([
            'nazwa' => "ACC",
            'zalecaneDawkowanie' => 2,
            'ilosc' => 20,
            'cena' => 12.36,
            'opis' => "Lek dostępny bez recepty. Lek mukolityczny, rozrzedza wydzielinę w drogach oddechowych i ułatwia jej usuwanie. Preparat należy przyjmować po posiłku. Nie stosować bezpośrednio przed snem.",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('leki')->insert([
            'nazwa' => "APAP",
            'zalecaneDawkowanie' => 3,
            'ilosc' => 50,
            'cena' => 20.96,
            'opis' => "Preparat zawiera paracetamol, lek przeciwbólowy i przeciwgorączkowy. Należy zachować co najmniej 4 godzinny odstęp pomiędzy dawkami.",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('dane_uzytkownika')->insert([
            'idUzytkownika' => 1,
            'imie' => "Konrad",
            'nazwisko' => "Kmak",
            'dataUrodzenia' => Carbon::createFromDate(1998,6,4,'Europe/Warsaw')->format('Y-m-d'),
            'telefon' => "783553913",
            'telefonPomocniczy' => "123654998",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('obwody')->insert([
            'idUzytkownika' => 1,
            'biceps' => 35,
            "klataPiersiowa" => 90,
            "talia" => 85,
            "pas" => 95,
            "biodra" => 100,
            "uda" => 50,
            "lydka" => 30,
            "created_at" => Carbon::now()->subDays(30)->format('Y-m-d H:i:s'),
            "updated_at" => Carbon::now()->subDays(30)->format('Y-m-d H:i:s'),
        ]);

        DB::table('obwody')->insert([
            'idUzytkownika' => 1,
            'biceps' => 37,
            "klataPiersiowa" => 92,
            "talia" => 83,
            "pas" => 95,
            "biodra" => 95,
            "uda" => 45,
            "lydka" => 30,
            "created_at" => Carbon::now()->subDays(23)->format('Y-m-d H:i:s'),
            "updated_at" => Carbon::now()->subDays(23)->format('Y-m-d H:i:s'),
        ]);

        DB::table('obwody')->insert([
            'idUzytkownika' => 1,
            'biceps' => 39,
            "klataPiersiowa" => 94,
            "talia" => 80,
            "pas" => 93,
            "biodra" => 95,
            "uda" => 43,
            "lydka" => 29,
            "created_at" => Carbon::now()->subDays(15)->format('Y-m-d H:i:s'),
            "updated_at" => Carbon::now()->subDays(15)->format('Y-m-d H:i:s'),
        ]);

        DB::table('obwody')->insert([
            'idUzytkownika' => 1,
            'biceps' => 40,
            "klataPiersiowa" => 96,
            "talia" => 80,
            "pas" => 94,
            "biodra" => 90,
            "uda" => 44,
            "lydka" => 30,
            "created_at" => Carbon::now()->subDays(7)->format('Y-m-d H:i:s'),
            "updated_at" => Carbon::now()->subDays(7)->format('Y-m-d H:i:s'),
        ]);

        DB::table('obwody')->insert([
            'idUzytkownika' => 1,
            'biceps' => 40,
            "klataPiersiowa" => 100,
            "talia" => 80,
            "pas" => 93,
            "biodra" => 90,
            "uda" => 40,
            "lydka" => 28,
            "created_at" => Carbon::now()->format('Y-m-d H:i:s'),
            "updated_at" => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        
        DB::table('waga')->insert([
            'idUzytkownika' => 1,
            'waga' => 97,
            "created_at" => Carbon::now()->subDays(90)->format('Y-m-d H:i:s'),
            "updated_at" => Carbon::now()->subDays(90)->format('Y-m-d H:i:s'),
        ]);

        DB::table('waga')->insert([
            'idUzytkownika' => 1,
            'waga' => 96.5,
            "created_at" => Carbon::now()->subDays(60)->format('Y-m-d H:i:s'),
            "updated_at" => Carbon::now()->subDays(60)->format('Y-m-d H:i:s'),
        ]);

        DB::table('waga')->insert([
            'idUzytkownika' => 1,
            'waga' => 96,
            "created_at" => Carbon::now()->subDays(30)->format('Y-m-d H:i:s'),
            "updated_at" => Carbon::now()->subDays(30)->format('Y-m-d H:i:s'),
        ]);

        DB::table('waga')->insert([
            'idUzytkownika' => 1,
            'waga' => 95.5,
            "created_at" => Carbon::now()->format('Y-m-d H:i:s'),
            "updated_at" => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('wzrost')->insert([
            'idUzytkownika' => 1,
            'wzrost' => 187,
            "created_at" => Carbon::now()->subMonths(9)->format('Y-m-d H:i:s'),
            "updated_at" => Carbon::now()->subMonths(9)->format('Y-m-d H:i:s'),
        ]);    

        DB::table('wzrost')->insert([
            'idUzytkownika' => 1,
            'wzrost' => 187.3,
            "created_at" => Carbon::now()->subMonths(6)->format('Y-m-d H:i:s'),
            "updated_at" => Carbon::now()->subMonths(6)->format('Y-m-d H:i:s'),
        ]);  

        DB::table('wzrost')->insert([
            'idUzytkownika' => 1,
            'wzrost' => 187.6,
            "created_at" => Carbon::now()->subMonths(3)->format('Y-m-d H:i:s'),
            "updated_at" => Carbon::now()->subMonths(3)->format('Y-m-d H:i:s'),
        ]);  

        DB::table('wzrost')->insert([
            'idUzytkownika' => 1,
            'wzrost' => 188,
            "created_at" => Carbon::now()->format('Y-m-d H:i:s'),
            "updated_at" => Carbon::now()->format('Y-m-d H:i:s'),
        ]);  

        DB::table('cisnienie')->insert([
            'idUzytkownika' => 1,
            'skurczowe' => 130,
            'rozkurczowe' => 90,
            'tetno' => 80,
            "created_at" => Carbon::now()->subDays(6)->format('Y-m-d H:i:s'),
            "updated_at" => Carbon::now()->subDays(6)->format('Y-m-d H:i:s'),
        ]);
        DB::table('cisnienie')->insert([
            'idUzytkownika' => 1,
            'skurczowe' => 125,
            'rozkurczowe' => 85,
            'tetno' => 83,
            "created_at" => Carbon::now()->subDays(5)->format('Y-m-d H:i:s'),
            "updated_at" => Carbon::now()->subDays(5)->format('Y-m-d H:i:s'),
        ]);

        DB::table('cisnienie')->insert([
            'idUzytkownika' => 1,
            'skurczowe' => 127,
            'rozkurczowe' => 87,
            'tetno' => 87,
            "created_at" => Carbon::now()->subDays(4)->format('Y-m-d H:i:s'),
            "updated_at" => Carbon::now()->subDays(4)->format('Y-m-d H:i:s'),
        ]);

        DB::table('cisnienie')->insert([
            'idUzytkownika' => 1,
            'skurczowe' => 135,
            'rozkurczowe' => 94,
            'tetno' => 95,
            "created_at" => Carbon::now()->subDays(3)->format('Y-m-d H:i:s'),
            "updated_at" => Carbon::now()->subDays(3)->format('Y-m-d H:i:s'),
        ]);

        DB::table('cisnienie')->insert([
            'idUzytkownika' => 1,
            'skurczowe' => 124,
            'rozkurczowe' => 84,
            'tetno' => 80,
            "created_at" => Carbon::now()->subDays(2)->format('Y-m-d H:i:s'),
            "updated_at" => Carbon::now()->subDays(2)->format('Y-m-d H:i:s'),
        ]);

        DB::table('cisnienie')->insert([
            'idUzytkownika' => 1,
            'skurczowe' => 130,
            'rozkurczowe' => 86,
            'tetno' => 75,
            "created_at" => Carbon::now()->subDays(1)->format('Y-m-d H:i:s'),
            "updated_at" => Carbon::now()->subDays(1)->format('Y-m-d H:i:s'),
        ]);
        
        DB::table('cisnienie')->insert([
            'idUzytkownika' => 1,
            'skurczowe' => 130,
            'rozkurczowe' => 90,
            'tetno' => 80,
            "created_at" => Carbon::now()->format('Y-m-d H:i:s'),
            "updated_at" => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        

    }
}
