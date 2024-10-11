<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioTieneServicio extends Model
{
    use HasFactory;

    // Campos protegidos.
    protected $table = 'usuarios_tienen_servicios';
    protected $fillable = [
        'user_id',
        'service_id',
    ];

    // Relación con el modelo de User

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relación con el modelo de Servicio

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'service_id');
    }
}
