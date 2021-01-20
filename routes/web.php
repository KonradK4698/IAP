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

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::post('/home/przyjmijLek/{id}', 'HomeController@przyjmijLek')->name('przyjmijLek')->middleware('auth');

//dane użytkownika
Route::get('/home/daneUzytkownika', 'DaneUzytkownikaController@widok')->name('daneUzytkownika')->middleware('auth');
Route::post('/home/daneUzytkownika', 'DaneUzytkownikaController@store')->middleware('auth');
//dane dodatkowe uzytkownika
Route::get('/home/daneDodatkowe', 'DaneDodatkoweController@widok')->name('daneDodatkowe')->middleware('auth');
//wzrost
Route::post('/home/daneDodatkowe/dodajWrost', 'DaneDodatkoweController@dodajWzrost')->name('dodajWzrostPost')->middleware('auth');
//waga
Route::post('/home/daneDodatkowe/dodajWage', 'DaneDodatkoweController@dodajWage')->name('dodajWage')->middleware('auth');
//obwody
Route::post('/home/daneDodatkowe/dodajObwody', 'DaneDodatkoweController@dodajObwody')->name('dodajObwody')->middleware('auth');
//pomiar ciśnienia użytkownika
Route::get('/home/pomiarCisnienia', 'PomiarCisnieniaController@widok')->name('pomiarCisnienia')->middleware('auth');
Route::post('/home/pomiarCisnienia/dodajPomiary', 'PomiarCisnieniaController@dodajPomiary')->name('dodajPomiary')->middleware('auth');
//baza leków 
Route::get('/home/bazaLekow', 'BazaLekowController@widok')->name('bazaLekow')->middleware('auth');
Route::post('/home/bazaLekow/dodajLek', 'BazaLekowController@dodajLek')->name('dodajLek')->middleware('auth');
Route::get('/home/bazaLekow/lek/{id}', 'BazaLekowController@opisLeku')->name('opisLeku')->middleware('auth');

//twoje leki
Route::get('/home/twojeLeki', 'TwojeLekiController@widok')->name('twojeLeki')->middleware('auth');
Route::post('/home/twojeLeki/dodajLek', 'TwojeLekiController@dodajLek')->name('dodajLekUzytkownika')->middleware('auth');
Route::post('/home/twojeLeki/dodajOpakowanie/{id}/{idLeku}', 'TwojeLekiController@dodajOpakowanie')->name('dodajOpakowanie')->middleware('auth');
Route::post('/home/twojeLeki/dodajLekiNaSztuki/{id}/{idLeku}', 'TwojeLekiController@dodajLekiNaSztuki')->name('dodajLekiNaSztuki')->middleware('auth');

//wydarzenia
Route::get('/home/wydarzenia', 'WydarzeniaController@widok')->name('wydarzenia')->middleware('auth');
Route::post('/home/wydarzenia/dodajWydarzenie', 'WydarzeniaController@dodaj')->name('dodajWydarzenie')->middleware('auth');

//statystyka
Route::get('/home/statystyka', 'StatystykaController@widok')->name('statystyka')->middleware('auth');

//raport
Route::get('/home/raport', 'RaportUzytkownikaController@widok')->name('raport')->middleware('auth');
Route::get('/home/raport/pdf/{miesiac}', 'RaportUzytkownikaController@utworzPDF')->name('utworzPDF')->middleware('auth');

//panel adminsitratora
Route::get('/home/administrator', 'AdministracjaController@widok')->name('panelAdmina')->middleware('auth');
Route::get('/home/administrator/edytujUzytkownika/{id}', 'AdministracjaController@edytujUzytkownika')->name('edytujUzytkownika')->middleware('auth');
Route::delete('/home/administrator/usunUzytkownika/{id}', 'AdministracjaController@usunUzytkownika')->name('usunUzytkownika')->middleware('auth');

Route::get('/home/administrator/edytujDaneUzytkownika/{daneID}', 'AdministracjaController@edytujDaneUzytkownika')->name('edytujDaneUzytkownika')->middleware('auth');

Route::get('/home/administrator/edytujDaneUzytkownika/{daneID}', 'AdministracjaController@edytujDaneUzytkownika')->name('edytujDaneUzytkownika')->middleware('auth');

Route::post('/home/administrator/edytujDaneUzytkownikaPost/{daneID}', 'AdministracjaController@edytujDaneUzytkownikaPost')->name('edytujDaneUzytkownikaPost')->middleware('auth');

Route::delete('/home/administrator/usunDaneUzytkownika/{daneID}', 'AdministracjaController@usunDaneUzytkownika')->name('usunDaneUzytkownika')->middleware('auth');

Route::get('/home/administrator/edytujWageUzytkownika/{wagaID}', 'AdministracjaController@edytujWageUzytkownika')->name('edytujWageUzytkownika')->middleware('auth');
Route::post('/home/administrator/edytujWageUzytkownikaPost/{wagaID}', 'AdministracjaController@edytujWageUzytkownikaPost')->name('edytujWageUzytkownikaPost')->middleware('auth');
Route::delete('/home/administrator/usunWageUzytkownika/{wagaID}', 'AdministracjaController@usunWageUzytkownika')->name('usunWageUzytkownika')->middleware('auth');

Route::get('/home/administrator/edytujWzrostUzytkownika/{wzrostID}', 'AdministracjaController@edytujWzrostUzytkownika')->name('edytujWzrostUzytkownika')->middleware('auth');
Route::post('/home/administrator/edytujWzrostUzytkownikaPost/{wzrostID}', 'AdministracjaController@edytujWzrostUzytkownikaPost')->name('edytujWzrostUzytkownikaPost')->middleware('auth');
Route::delete('/home/administrator/usunWzrostUzytkownika/{wzrostID}', 'AdministracjaController@usunWzrostUzytkownika')->name('usunWzrostUzytkownika')->middleware('auth');

Route::get('/home/administrator/edytujObwodyUzytkownika/{obwodyID}', 'AdministracjaController@edytujObwodyUzytkownika')->name('edytujObwodyUzytkownika')->middleware('auth');
Route::post('/home/administrator/edytujObwodyUzytkownikaPost/{obwodyID}', 'AdministracjaController@edytujObwodyUzytkownikaPost')->name('edytujObwodyUzytkownikaPost')->middleware('auth');
Route::delete('/home/administrator/usunObwodyUzytkownika/{obwodyID}', 'AdministracjaController@usunObwodyUzytkownika')->name('usunObwodyUzytkownika')->middleware('auth');

Route::delete('/home/administrator/usunLekUzytkownika/{lekID}', 'AdministracjaController@usunLekUzytkownika')->name('usunLekUzytkownika')->middleware('auth');

Route::delete('/home/administrator/usunWydarzenieUzytkownika/{wydarzenieID}', 'AdministracjaController@usunWydarzenieUzytkownika')->name('usunWydarzenieUzytkownika')->middleware('auth');

Route::delete('/home/administrator/potwierdzLek', 'AdministracjaController@potwierdzLek')->name('potwierdzLek')->middleware('auth');