<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nominas extends Model
{
    use HasFactory;
    //use Softdeletes; //2.usando softdeletes
    protected $primaryKey = 'idn'; //Definiendo cual es la llave primaria de nuestra tabla.
    protected $fillable = ['idn','fecha','monto','diast','ide'];
    //Con esto (modelo) vamos a poder acceder desde nuestro controlador a nuestras tablas.
    //Se declara cuales son los campos que se van a ocupar en esta tabla para poder hacer las insecciones masivas o actualizaciones masivas.
}
