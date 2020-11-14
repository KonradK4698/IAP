<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Obwody extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obwody', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUzytkownika');
            $table->double('biceps',3,2);
            $table->double('klataPiersiowa',3,2);
            $table->double('talia',3,2);
            $table->double('pas',3,2);
            $table->double('biodra',3,2);
            $table->double('uda',3,2);
            $table->double('łydka',3,2);
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
        Schema::dropIfExists('obwody');
    }
}
