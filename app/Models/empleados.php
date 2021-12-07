<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes; //1.Instanciando la libreria softdelete

class empleados extends Model
{
    use HasFactory;
    use Softdeletes; //2.usando softdeletes
    protected $primaryKey = 'ide'; //Definiendo cual es la llave primaria de nuestra tabla.
    protected $fillable = ['ide','nombre','apellido','email','celular','sexo','descripcion','imagen','idd'];
    //Con esto (modelo) vamos a poder acceder desde nuestro controlador a nuestras tablas.
    //Se declara cuales son los campos que se van a ocupar en esta tabla para poder hacer las insecciones masivas o actualizaciones masivas.
}
