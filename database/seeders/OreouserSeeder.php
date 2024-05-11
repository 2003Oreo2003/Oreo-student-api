<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Oreouser;

class OreouserSeeder extends Seeder
{
    public function run()
    {
        Oreouser::factory()->count(10)->create();
    }
}
