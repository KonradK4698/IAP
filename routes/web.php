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
//dane dodatkowe uzytkownika
Route::get('/home/daneDodatkowe', 'DaneDodatkoweController@widok')->name('daneDodatkowe');
Route::post('/home/daneUzytkownika/dodajWzrost', 'DaneDodatkoweController@dodajWzrost')->name('dodajWzrostPost');
Route::post('/home/daneUzytkownika/dodajObwody', 'DaneDodatkoweController@dodajObwody')->name('dodajObwody');
Route::post('/home/daneUzytkownika/dodajWage', 'DaneDodatkoweController@dodajWage')->name('dodajWage');
//pomiar ciśnienia użytkownika
Route::get('/home/pomiarCisnienia', 'PomiarCisnieniaController@widok')->name('pomiarCisnienia');
Route::post('/home/pomiarCisnienia/dodajPomiary', 'PomiarCisnieniaController@dodajPomiary')->name('dodajPomiary');
//baza leków 
Route::get('/home/bazaLekow', 'BazaLekowController@widok')->name('bazaLekow');
Route::post('/home/bazaLekow/dodajLek', 'BazaLekowController@dodajLek')->name('dodajLek');