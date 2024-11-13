<?php

namespace Database\Factories;

use App\Models\Orden;
use App\Models\User;
use App\Models\Servicio;
use App\Models\CursosEnOrden;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrdenFactory extends Factory
{
    protected $model = Orden::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
        ];
    }

    public function conServicios()
    {
        return $this->afterCreating(function (Orden $orden) {
            $servicios = Servicio::inRandomOrder()->take(rand(1, 3))->get();
            $total = 0;

            foreach ($servicios as $servicio) {
                CursosEnOrden::factory()->create([
                    'ordenes_id' => $orden->id,
                    'servicios_id' => $servicio->id,
                ]);
                $total += $servicio->precio;
            }

           
            $orden->total = $total;
        });
    }
}
