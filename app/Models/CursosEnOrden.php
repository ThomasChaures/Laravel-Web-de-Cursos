<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CursosEnOrden extends Model
{
    use HasFactory;

    protected $table  = 'cursos_en_ordenes';

    protected $fillable = [
        'ordenes_id',
        'servicios_id'
    ];

    
    public function ordenes(){
        return $this->belongsTo(Orden::class, 'ordenes_id');
    }

    public function servicio(){
        return $this->belongsTo(Servicio::class, 'servicios_id');
    }
}
