<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigoProyecto');
            $table->string('nombreEmpresa');
            $table->string('rucEmpresa');
            $table->double('propuesta');
            $table->integer('tiempoPropuesta');
            $table->double('puntajePropuesta');
            $table->double('puntajeTiempo');
            $table->double('puntajeVAE');
            $table->double('puntajeTotal');
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
        Schema::dropIfExists('resultados');
    }
}
