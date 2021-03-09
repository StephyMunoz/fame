<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ofertantes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //se crea la tabla ofertantes con los siguientes atributos
        Schema::create('ofertantes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigoProyecto');
            $table->string('rucEmpresa');
            $table->string('nombreEmpresa');
            $table->double('propuesta');
            $table->integer('plazoOferta');
            $table->string('vae');
            $table->double('importacion')->nullable();;
            $table->double('extranjero')->nullable();;
            $table->rememberToken();
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
        Schema::dropIfExists('ofertantes');
    }
}
