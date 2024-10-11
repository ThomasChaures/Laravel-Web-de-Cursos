<?php

namespace Database\Seeders;

use App\Models\Novedad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NovedadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Uso 'factory()' para crear 10 novedades.
        Novedad::factory()->count(10)->create();
    }
}
