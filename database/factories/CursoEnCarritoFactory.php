<?php

namespace Database\Factories;

use App\Models\Carrito;
use App\Models\CursoEnCarrito;
use App\Models\Servicio;
use Illuminate\Database\Eloquent\Factories\Factory;

class CursoEnCarritoFactory extends Factory
{
    protected $model = CursoEnCarrito::class;

    public function definition()
    {
        return [
            'carritos_id' => Carrito::factory(),
            'servicios_id' => Servicio::factory(),
        ];
    }
}
