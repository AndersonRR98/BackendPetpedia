<?php

namespace Database\Seeders;

use App\Models\Average;
use Illuminate\Database\Seeder;

class AverageSeeder extends Seeder
{
    public function run(): void
    {
        Average::factory(20)->create();
    }
}
