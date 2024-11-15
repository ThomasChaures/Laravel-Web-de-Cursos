<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rol>
 */
class RolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => 'Usuario', 
        ];
    }

    public function admin(): static
    {
        return $this->state(fn (array $attributes) => [
            'nombre' => 'Admin',
        ]);
    }

    public function usuario(): static
    {
        return $this->state(fn (array $attributes) => [
            'nombre' => 'Usuario',
        ]);
    }
}
