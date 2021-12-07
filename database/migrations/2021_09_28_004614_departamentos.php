<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//Comando para crear migracion: php artisan make:migration nombredemigracion
//configurar conexion a DB: archivo .env y config/database.php en el apartado mysql
//Para guardar la migracion, es decir despues de poner los campos de la BD eb function up dentro de este archivo,...
//en cmd ejecutamos el siguiente comando: php artisan migrate
//Rollback deshace el ultimo movimiento de migracion que hicimos a nuestra BD con el comando: php artisan migrate:rollback 


class Departamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('departamentos',function(Blueprint $table){
          $table->increments('idd');
          $table->string('nombre', 40);
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
        Schema::drop('departamentos');
    }
}
