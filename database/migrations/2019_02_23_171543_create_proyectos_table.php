<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //se crea la tabla proyectos con los diferentes atributos
        Schema::create('proyectos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigoProyecto')->unique();
            $table->string('nombreProyecto');
            $table->text('descripcionProyecto');
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
        Schema::dropIfExists('proyectos');
    }
}
