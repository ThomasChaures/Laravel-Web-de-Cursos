<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $fillable = ['nombre'];

    public function users()
    {
        // Especifico la clave foránea que conecta la tabla users con la tabla roles.
        return $this->hasMany(User::class, 'role_id');
    }
}
