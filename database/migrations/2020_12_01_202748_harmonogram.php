<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Harmonogram extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('harmonogram', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idLekuUzytkownika');
            $table->date('data');
            $table->time('godzina');
            $table->boolean('potwierdzenie')->default('0');
            $table->foreign('idLekuUzytkownika')->references('id')->on('leki_uzytkownika')->onDelete('cascade');
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
        Schema::dropIfExists('harmonogram');
    }
}
