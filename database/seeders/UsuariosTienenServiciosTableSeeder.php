<?php

namespace Database\Seeders;

use App\Models\UsuarioTieneServicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuariosTienenServiciosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Usando 'factory' para crear 10 relaciones.
        UsuarioTieneServicio::factory()->count(10)->create();
    }
}
