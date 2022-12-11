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
        Schema::create('servicos_problemas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_servico');
            $table->unsignedBigInteger('id_problema');

            $table->foreign('id_servico')->references('id_servico')->on('servicos');
            $table->foreign('id_problema')->references('id_problema')->on('problemas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicos_problemas');
    }
};
