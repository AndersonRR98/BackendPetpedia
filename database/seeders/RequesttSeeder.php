<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequesttSeeder extends Seeder
{
    public function run(): void
    {
        $requestts = [
            [
                'priority' => 'high',
                'application_status' => 'accepted',
                'adoption_id' => 1,
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'priority' => 'medium',
                'application_status' => 'finished',
                'adoption_id' => 2,
                'user_id' => 3,
                'created_at' => now()->subDays(7),
                'updated_at' => now()->subDays(2),
            ],
            [
                'priority' => 'urgent',
                'application_status' => 'accepted',
                'adoption_id' => null,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('requestts')->insert($requestts);
    }
}