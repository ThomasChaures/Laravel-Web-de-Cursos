<?php

namespace Database\Factories;

use App\Models\Carrito;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarritoFactory extends Factory
{
    protected $model = Carrito::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(), 
        ];
    }
}

