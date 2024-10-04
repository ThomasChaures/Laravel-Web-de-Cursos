<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novedad extends Model
{
    use HasFactory;
    protected $table = 'novedades';
    protected $fillable = [
        'titulo',
        'contenido',
        'img',
        'user_id' // Agrego la clave foranea que conecta cada novedad con un usuario
    ];

    public function user()
    {

        return $this->belongsTo(User::class, 'user_id');
    }
}
