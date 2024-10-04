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
        // Creo los 2 roles: Admin y Usuario.
        Rol::create(['nombre' => 'Admin']);
        Rol::create(['nombre' => 'Usuario']);
    }
}
