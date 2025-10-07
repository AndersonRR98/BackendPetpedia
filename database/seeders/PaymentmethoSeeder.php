<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentmethoSeeder extends Seeder
{
    public function run(): void
    {
        $paymentmethods = [
            [
                'type' => 'tarjeta_credito',
                'description' => 'Visa terminada en 1234',
                'date_issued' => now(),
                'payment_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'pse',
                'description' => 'Pago por PSE - Bancolombia',
                'date_issued' => now(),
                'payment_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'efectivo',
                'description' => 'Pago en efectivo en punto físico',
                'date_issued' => now(),
                'payment_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('paymentmethos')->insert($paymentmethods);
    }
}