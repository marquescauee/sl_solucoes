<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitacoes', function (Blueprint $table) {
            $table->id($column = 'id_solicitacao');
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_equipamento');
            $table->string('codigo', 20);
            $table->dateTime('data_criacao');

            $table->foreign('id_cliente')->references('id_cliente')->on('clientes');

            $table->foreign('id_equipamento')->references('id_equipamento')->on('equipamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitacoes');
    }
};
