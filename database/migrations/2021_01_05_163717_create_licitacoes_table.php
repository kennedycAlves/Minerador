<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicitacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licitacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->string('nome_interesse');
            $table->string('creation_time');
            $table->string('n_registro');
            $table->string('uasg');
            $table->string('orgao');
            $table->string('tipo_edital');
            $table->string('edital');
            $table->string('objeto');
            $table->string('data_abertura');
            $table->string('entrega');
            $table->string('estado');
            $table->string('telefone');
            $table->string('link');     
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
        Schema::dropIfExists('licitacoes');
    }
}
