<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DaneUzytkownika extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dane_uzytkownika', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUzytkownika');
            $table->string('imie');
            $table->string('nazwisko');
            $table->date('dataUrodzenia');
            $table->string('telefon');
            $table->string('telefonPomocniczy');
            $table->foreign('idUzytkownika')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dane_uzytkownika');
    }
}
