<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LekiUzytkownika extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leki_uzytkownika', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUzytkownika');
            $table->unsignedBigInteger('idLeku');
            $table->mediumInteger('iloscPaczek');
            $table->mediumInteger('iloscLeku');
            $table->mediumInteger('dawkowanie');
            $table->mediumInteger('czestotliwosc');
            $table->foreign('idUzytkownika')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idLeku')->references('id')->on('leki')->onDelete('cascade');
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
        Schema::dropIfExists('leki_uzytkownika');
    }
}
