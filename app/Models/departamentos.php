<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Comando para crear modelo: php artisan make:model nombredelmodelo
//Nota: es importamte que el nombre de nuestro Modelo conicida con el nombre de nuestra tabla en BD.

class departamentos extends Model
{
    use HasFactory;
    protected $primaryKey = 'idd'; //Definiendo cual es la llave primaria de nuestra tabla.
    protected $fillable =['idd','nombre']; //Con esto (modelo) vamos a poder acceder desde nuestro controlador a nuestras tablas.
    //Se declara cuales son los campos que se van a ocupar en esta tabla para poder hacer las insecciones masivas o actualizaciones masivas.
}
