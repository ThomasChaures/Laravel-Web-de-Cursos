<?php

namespace Database\Factories;

use App\Models\CursosEnOrden;
use App\Models\Orden;
use App\Models\Servicio;
use Illuminate\Database\Eloquent\Factories\Factory;

class CursosEnOrdenFactory extends Factory
{
    protected $model = CursosEnOrden::class;

    public function definition()
    {
        return [
            'ordenes_id' => Orden::factory(),
            'servicios_id' => Servicio::inRandomOrder()->first()->id, 
        ];
    }

    public function forOrden(Orden $orden)
    {
        return $this->state([
            'ordenes_id' => $orden->id,
        ]);
    }
}
