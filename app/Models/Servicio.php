<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $guard = ['id'];
    protected $fillable = [
        'nombre',
        'descripcion',
        'img',
        'precio',
        'clases',
        'estudiantes',
        'categoria'
    ];
}
