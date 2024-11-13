<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Servicio;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            ServiciosTableSeeder::class,
            UsuariosTienenServiciosTableSeeder::class,
            NovedadesTableSeeder::class,
            CarritosSeeder::class,
            CursosEnCarritoSeeder::class,
            PagosSeeder::class,
        ]);
        
    }
}
