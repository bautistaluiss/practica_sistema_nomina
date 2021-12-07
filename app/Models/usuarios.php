<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
    use HasFactory;
    protected $primaryKey = 'idu'; //Definiendo cual es la llave primaria de nuestra tabla.
    protected $fillable =['idu','nombre','apellido','user','password','tipo','activo'];
}
