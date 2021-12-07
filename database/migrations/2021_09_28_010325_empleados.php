<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Empleados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('empleados', function(Blueprint $table){
          $table->increments('ide');
          $table->string('nombre', 40);
          $table->string('apellido', 40);
          $table->string('email', 40);
          $table->string('celular', 13);
          $table->string('sexo', 1);
          $table->string('descripcion', 255);
          $table->string('imagen', 255)->nullable();
          //$table->string('edad', 4);
          //$table->string('salario', 15);

          //llave foranea idd
          //creacion del campo idd
          $table->integer('idd')->unsigned();
          //asignacion o referencia a tabla (llave foranea).
          $table->foreign('idd')->references('idd')->on('departamentos');
          //El campo ('idd')->unsigned(); creado va fungir como llave foranea y que va hacer referencia al campo idd ubicado...
          //en la tabla departamentos.

          $table->rememberToken();
          $table->timestamps();
          $table->softDeletes(); //Columna para soft delete
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('empleados');
    }
}
