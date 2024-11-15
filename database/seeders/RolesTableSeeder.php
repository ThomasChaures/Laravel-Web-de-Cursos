<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Crea un rol Admin
        Rol::factory()->admin()->create();

        // Crea un rol Usuario
        Rol::factory()->usuario()->create();
    }
}
