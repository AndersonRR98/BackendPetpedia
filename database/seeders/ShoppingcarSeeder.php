<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShoppingCarSeeder extends Seeder
{
    public function run(): void
    {
        $shoppingcars = [
            [
                'amount' => 101.74,
                'date' => '2024-01-15',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'amount' => 45.50,
                'date' => '2024-01-16',
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'amount' => 176.90,
                'date' => '2024-01-17',
                'user_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('shoppingcars')->insert($shoppingcars);
    }
}