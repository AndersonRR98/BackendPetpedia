<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shoppingcar;

class ShoppingcarSeeder extends Seeder
{
    public function run(): void
    {
        Shoppingcar::factory()->count(20)->create();
    }
}
