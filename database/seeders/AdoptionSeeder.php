<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Adoption;

class AdoptionSeeder extends Seeder
{
    public function run(): void
    {
        Adoption::factory()->count(20)->create();
    }
}
