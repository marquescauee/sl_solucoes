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
        Schema::create('servicos', function (Blueprint $table) {
            $table->unsignedBigInteger($column = 'id_servico');
            $table->unsignedBigInteger('id_funcionario');
            $table->string('status', 40);
            $table->dateTime('data_analise');
            $table->dateTime('data_andamento')->nullable();
            $table->dateTime('data_pronto_entrega')->nullable();
            $table->dateTime('data_finalizado')->nullable();

            $table->foreign('id_servico')->references('id_solicitacao')->on('solicitacoes');
            $table->foreign('id_funcionario')->references('id_funcionario')->on('funcionarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicos');
    }
};
