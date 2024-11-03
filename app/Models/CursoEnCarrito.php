<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CursoEnCarrito extends Model
{
    use HasFactory;

    protected $table = 'cursos_en_carrito';

    protected $fillable = [
        'carritos_id',
        'servicios_id'
    ];

    public function carrito()
    {
        return $this->belongsTo(Carrito::class, 'carritos_id');
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'servicios_id');
    }
}
