<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Leki extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leki', function (Blueprint $table) {
            $table->id();
            $table->string('nazwa');
            $table->smallInteger('zalecaneDawkowanie');
            $table->smallInteger('ilosc');
            $table->double('cena',6,2);
            $table->text('opis');
            $table->boolean('potwierdzenieAdmina')->nullable();
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
        Schema::dropIfExists('leki');
    }
}
