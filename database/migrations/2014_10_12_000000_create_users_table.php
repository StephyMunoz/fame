<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ofertantes', function (Blueprint $table) {
            $table->id('rucEmpresa');
            $table->string('nombreEmpresa');
            $table->double('propuesta');
            $table->integer('plazoOfertado');
            $table->double('vae');
            $table->double('puntajePrecio');
            $table->double('puntajePlazo');
            $table->double('totalPuntaje');
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
