<?php

namespace Database\Seeders;

use App\Models\Carrito;
use Illuminate\Database\Seeder;

class CarritosSeeder extends Seeder
{
    public function run()
    {
        Carrito::factory()->count(10)->create();
    }
}
