<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HarmonogramDaty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('harmonogram_daty', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idLekuUzytkownika');
            $table->date('rozpocznij');
            $table->date('zakoncz');
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
        Schema::dropIfExists('harmonogram_daty');
    }
}
