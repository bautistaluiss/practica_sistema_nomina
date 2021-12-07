<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Usuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('usuarios',function(Blueprint $table){
          $table->increments('idu');
          $table->string('nombre', 40);
          $table->string('apellido', 40);
          $table->string('user', 50);
          $table->string('password', 255);
          $table->string('tipo', 40);
          $table->string('activo');

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
        Schema::drop('usuarios');
    }
}
