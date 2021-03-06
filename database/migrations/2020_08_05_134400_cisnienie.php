<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cisnienie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cisnienie', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUzytkownika');
            $table->unsignedInteger('skurczowe');
            $table->unsignedInteger('rozkurczowe');
            $table->unsignedInteger('tetno');
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
        Schema::dropIfExists('cisnienie');
    }
}
