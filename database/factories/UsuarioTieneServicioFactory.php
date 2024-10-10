<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Servicio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UsuarioTieneServicio>
 */
class UsuarioTieneServicioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Selecciono un usuario aleatorio.
            'user_id' => User::inRandomOrder()->first()->id,
            // Selecciono un servicio aleatorio.
            'service_id' => Servicio::inRandomOrder()->first()->id,
        ];
    }
}
