<?php

namespace Database\Factories;

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
                'img' => $this->faker->imageUrl(640, 480, 'products', true, 'Faker')
        ];
    }
}
