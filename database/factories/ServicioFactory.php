<?php

namespace Database\Factories;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Servicio>
 */
class ServicioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'nombre' => fake()->name(),
                'descripcion' => fake()->paragraph(3,true),
                'precio' => fake()->randomFloat(2, 2000, 99999),
                'img' => 'placeholder.jpeg',
                'estudiantes' => fake()->numberBetween(0, 300),
                'clases' => fake()->numberBetween(8, 35),
                'categoria' => Arr::random(['frontend', 'backend', 'ux_ui', 'diseno_web', 'analisis_datos'])
        ];
    }
}
