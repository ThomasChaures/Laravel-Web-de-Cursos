<?php

namespace Database\Seeders;

use App\Models\CursosEnOrden;
use Illuminate\Database\Seeder;

class CursosEnOrdenesSeeder extends Seeder
{
    public function run()
    {
        CursosEnOrden::factory()->count(10)->create();
    }
}
