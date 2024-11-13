<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;

    protected $table = "ordenes";

    protected $fillable = [
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cursosEnOrden()
    {
        return $this->hasMany(CursosEnOrden::class, 'ordenes_id');
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class, 'ordenes_id');
    }
}
