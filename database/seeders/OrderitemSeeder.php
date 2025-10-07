<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemSeeder extends Seeder
{
    public function run(): void
    {
        $orderitems = [
            [
                'quantity' => 1,
                'price' => 85.99,
                'order_id' => 1,
                'product_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'quantity' => 1,
                'price' => 15.75,
                'order_id' => 1,
                'product_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'quantity' => 1,
                'price' => 45.50,
                'order_id' => 2,
                'product_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'quantity' => 1,
                'price' => 120.00,
                'order_id' => 3,
                'product_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'quantity' => 1,
                'price' => 28.90,
                'order_id' => 3,
                'product_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'quantity' => 1,
                'price' => 28.00,
                'order_id' => 3,
                'product_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('orderitems')->insert($orderitems);
    }
}