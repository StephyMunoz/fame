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
            $table->increments('id');
            $table->string('codigoProyecto');
            $table->string('rucEmpresa');
            $table->string('nombreEmpresa');
            $table->double('propuesta');
            $table->integer('plazoOferta');
            $table->double('vae');
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
