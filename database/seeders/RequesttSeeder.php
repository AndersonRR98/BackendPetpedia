<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Requestt;

class RequesttSeeder extends Seeder
{
    public function run(): void
    {
        Requestt::factory()->count(20)->create();
    }
}
