<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id' // Para conectar el usuario con su respectivo rol.
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relación con el modelo Rol.
    // Un usuario pertenece a un rol.

    public function rol()
    {
        // Especifico la clave foránea que conecta la tabla users con la tabla roles.
        return $this->belongsTo(Rol::class, 'role_id');
    }

    // Relación con el modelo Novedad.
    // Un usuario puede tener varias novedades.

    public function novedad()
    {
        return $this->hasMany(Novedad::class, 'user_id');
    }

    // Relación con el modelo servicio.
    // Un usuario puede tener varias novedades.
   public function servicios()
    {
        return $this->belongsToMany(Servicio::class, 'cursos_en_carrito', 'user_id', 'servicios_id');
    }
    public function servicio($curso){
        return $this->servicios()->where('servicios.id', $curso)->exists();
    }


    public function carrito()
    {
        return $this->hasOne(Carrito::class);
    }

    
}
