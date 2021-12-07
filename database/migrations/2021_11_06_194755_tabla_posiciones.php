<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablaPosiciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tablaPosiciones',function(Blueprint $table){
          $table->increments('idp');
          $table->string('foto', 40);
          $table->string('equipo', 40);
          $table->string('Pj', 50);
          $table->string('ganados', 40);
          $table->string('empatados', 40);
          $table->string('perdidos', 40);
          $table->string('gf', 40);
          $table->string('gc', 40);
          $table->string('dg', 40);
          $table->string('puntos', 40);

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
        Schema::drop('tablaPosiciones');
    }
}
