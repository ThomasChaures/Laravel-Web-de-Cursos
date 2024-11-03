<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;

    protected $table = 'carritos';

    protected $fillable = [
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function servicios()
    {
        return $this->hasMany(CursoEnCarrito::class, 'carritos_id');
    }
}