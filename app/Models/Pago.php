<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $fillable = [
        'ordenes_id',
        'total',
        'user_id'
    ];

    public function orden()
    {
        return $this->belongsTo(Orden::class, 'ordenes_id');
    }
}