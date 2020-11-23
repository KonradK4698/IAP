<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//dane użytkownika
Route::get('/home/daneUzytkownika', 'DaneUzytkownikaController@widok')->name('daneUzytkownika');
Route::post('/home/daneUzytkownika', 'DaneUzytkownikaController@store');
Route::get('/home/daneUzytkownika/aktualizacjaDanych/{id}', 'DaneUzytkownikaController@edit')->name('otworzAktualizacjeDanych');
Route::post('/home/daneUzytkownika/aktualizacjaDanych/{id}', 'DaneUzytkownikaController@update')->name('aktualizacjaDanychUzytkownika');
//dane dodatkowe uzytkownika
Route::get('/home/daneDodatkowe', 'DaneDodatkoweController@widok')->name('daneDodatkowe');
//wzrost
Route::post('/home/daneDodatkowe/dodajWzrost', 'DaneDodatkoweController@dodajWzrost')->name('dodajWzrostPost');
Route::delete('/home/daneDodatkowe/usunWzrost/{id}', 'DaneDodatkoweController@usunWzrost')->name('usunWzrostRoute');
//waga
Route::post('/home/daneDodatkowe/dodajWage', 'DaneDodatkoweController@dodajWage')->name('dodajWage');
Route::delete('/home/daneDodatkowe/usunWage/{id}', 'DaneDodatkoweController@usunWage')->name('usunWageRoute');
//obwody
Route::post('/home/daneDodatkowe/dodajObwody', 'DaneDodatkoweController@dodajObwody')->name('dodajObwody');
Route::get('/home/daneDodatkowe/aktualizacjaObwodow/{id}', 'DaneDodatkoweController@edytuj')->name('aktualizacjaObwodowWidok');
Route::post('/home/daneDodatkowe/aktualizacjaObwodow/{id}', 'DaneDodatkoweController@zaktualizuj')->name('aktualizacjaObwodow');
Route::delete('/home/daneDodatkowe/usunObwody/{id}', 'DaneDodatkoweController@usunObwody')->name('usunObwody');
//pomiar ciśnienia użytkownika
Route::get('/home/pomiarCisnienia', 'PomiarCisnieniaController@widok')->name('pomiarCisnienia');
Route::post('/home/pomiarCisnienia/dodajPomiary', 'PomiarCisnieniaController@dodajPomiary')->name('dodajPomiary');
Route::delete('/home/pomiarCisnienia/usunPomiary/{id}', 'PomiarCisnieniaController@usunPomiary')->name('usunPomiary');
//baza leków 
Route::get('/home/bazaLekow', 'BazaLekowController@widok')->name('bazaLekow');
Route::post('/home/bazaLekow/dodajLek', 'BazaLekowController@dodajLek')->name('dodajLek');

//twoje leki
Route::get('/home/twojeLeki', 'TwojeLekiController@widok')->name('twojeLeki');
Route::post('/home/twojeLeki/dodajLek', 'TwojeLekiController@dodajLek')->name('dodajLekUzytkownika');
Route::post('/home/twojeLeki/dodajOpakowanie/{id}/{idLeku}', 'TwojeLekiController@dodajOpakowanie')->name('dodajOpakowanie');
Route::post('/home/twojeLeki/dodajLekiNaSztuki/{id}/{idLeku}', 'TwojeLekiController@dodajLekiNaSztuki')->name('dodajLekiNaSztuki');
Route::delete('/home/twojeLeki/usunLek/{id}', 'TwojeLekiController@usunLek')->name('usunLek');