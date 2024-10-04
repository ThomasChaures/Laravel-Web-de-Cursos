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

    // Un servicio puede tener varios usuarios

    public function users()
    {
        return $this->belongsToMany(User::class, 'usuarios_tienen_servicios', 'service_id', 'user_id');
    }
}
