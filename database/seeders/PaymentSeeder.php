<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    public function run(): void
    {
        $payments = [
            [
                'amount' => 110.24,
                'date' => '2024-01-15',
                'status' => 'completed',
                'user_id' => 1,
                'payment_id' => 1,
                'payment_type' => 'App\\Models\\Order',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'amount' => 57.50,
                'date' => '2024-01-16',
                'status' => 'pending',
                'user_id' => 2,
                'payment_id' => 2,
                'payment_type' => 'App\\Models\\Order',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'amount' => 45.00,
                'date' => '2024-01-18',
                'status' => 'completed',
                'user_id' => 1,
                'payment_id' => 1,
                'payment_type' => 'App\\Models\\Service',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('payments')->insert($payments);
    }
}