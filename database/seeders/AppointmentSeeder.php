<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentSeeder extends Seeder
{
    public function run(): void
    {
        $appointments = [
            [
                'date' => '2024-01-20',
                'description' => '10:00',
                'status' => 'confirmed',
                'trainer_id' => null,
                'veterinary_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'date' => '2024-01-22',
                'description' => '15:30',
                'status' => 'pending',
                'trainer_id' => null,
                'veterinary_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'date' => '2024-01-25',
                'description' => '09:00',
                'status' => 'confirmed',
                'trainer_id' => 1,
                'veterinary_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'date' => '2024-01-26',
                'description' => '11:00',
                'status' => 'cancelled',
                'trainer_id' => 2,
                'veterinary_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('appointments')->insert($appointments);
    }
}