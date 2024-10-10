<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User; // Importo el modelo user

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Novedad>
 */
class NovedadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence(),
            'contenido' => $this->faker->paragraph(),
            'img' => $this->faker->imageUrl(),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
