<?php

namespace Database\Factories;

use App\Models\Pago;
use App\Models\User;
use App\Models\Orden;
use Illuminate\Database\Eloquent\Factories\Factory;

class PagoFactory extends Factory
{
    protected $model = Pago::class;

    public function definition()
    {

        $user = User::factory()->create();
        $orden = Orden::factory()->conServicios()->create(['user_id' => $user->id]);

        return [
            'user_id' => $user->id,
            'ordenes_id' => $orden->id,
            'total' => $orden->total, 
        ];
    }
}
