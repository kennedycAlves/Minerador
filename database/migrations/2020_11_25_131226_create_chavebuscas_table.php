<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChavebuscasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chavebuscas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_chave');
            $table->integer('areainteresse_id')->unsigned();
            $table->foreign('areainteresse_id')->references('id')->on('areainteresses')->onDelete('cascade');
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
        Schema::dropIfExists('chavebuscas');
    }
}
