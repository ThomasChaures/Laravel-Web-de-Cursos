<?php

namespace Database\Seeders;

use App\Models\Pago;
use Illuminate\Database\Seeder;

class PagosSeeder extends Seeder
{
    public function run()
    {
        Pago::factory()->count(10)->create();
    }
}
