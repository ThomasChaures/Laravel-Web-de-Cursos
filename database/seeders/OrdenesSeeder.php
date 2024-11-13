<?php

namespace Database\Seeders;

use App\Models\Orden;
use Illuminate\Database\Seeder;

class OrdenesSeeder extends Seeder
{
    public function run()
    {
        Orden::factory()->count(10)->create();
    }
}

