<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tablaposiciones extends Model
{
    use HasFactory;
    protected $primaryKey = 'idp'; //Definiendo cual es la llave primaria de nuestra tabla.
    protected $fillable = ['idp','foto','equipo','pj','ganados','empatados','perdidos','gf','gc','dg','puntos'];
}
