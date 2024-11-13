<?php

namespace Database\Seeders;

use App\Models\CursoEnCarrito;
use Illuminate\Database\Seeder;

class CursosEnCarritoSeeder extends Seeder
{
    public function run()
    {
        CursoEnCarrito::factory()->count(10)->create();
    }
}

