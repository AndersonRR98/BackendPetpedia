<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shipment;

class ShipmentSeeder extends Seeder
{
    public function run(): void
    {
        Shipment::factory()->count(20)->create();
    }
}
