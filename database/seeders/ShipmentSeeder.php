<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShipmentSeeder extends Seeder
{
    public function run(): void
    {
        $shipments = [
            [
                'address' => 'Carrera 45 #26-85, Apartamento 301, Bogotá',
                'cost' => 8.50,
                'shipping_method' => 'estándar',
                'status' => 'delivered',
                'order_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'address' => 'Calle 78 #12-34, Bogotá',
                'cost' => 12.00,
                'shipping_method' => 'express',
                'status' => 'shipped',
                'order_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'address' => 'Avenida 68 #45-23, Bogotá',
                'cost' => 15.00,
                'shipping_method' => 'express',
                'status' => 'cancelled',
                'order_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('shipments')->insert($shipments);
    }
}