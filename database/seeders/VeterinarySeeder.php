<?php

namespace Database\Seeders;

use App\Models\Veterinary;
use Illuminate\Database\Seeder;

class VeterinarySeeder extends Seeder
{
    public function run(): void
    {
        Veterinary::factory(10)->create();
    }
}
