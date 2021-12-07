<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Nominas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('nominas', function(Blueprint $table){
        $table->increments('idn');
        $table->date('fecha');
        $table->string('monto', 15);
        $table->string('diast', 15);

        //llave foranea idd
        //creacion del campo idd
        $table->integer('ide')->unsigned();
        //asignacion o referencia a tabla (llave foranea).
        $table->foreign('ide')->references('ide')->on('empleados');
        //El campo ('ide')->unsigned(); creado va fungir como llave foranea y que va hacer referencia al campo ide ubicado...
        //en la tabla empleados.
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::drop('nominas');
    }
}
