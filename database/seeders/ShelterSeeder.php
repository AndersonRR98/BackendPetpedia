<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShelterSeeder extends Seeder
{
    public function run(): void
    {
        $shelters = [
            [
                'shelter_name' => 'Refugio Animal Vida',
                'responsible_person' => 'María López',
                'capacity' => 50,
                'rating' => 4.5,
                'review_count' => 12,
                'image' => 'shelters/default.jpg',
                'user_id' => 13,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'shelter_name' => 'Huellitas Felices',
                'responsible_person' => 'Carlos Ramírez',
                'capacity' => 80,
                'rating' => 4.8,
                'review_count' => 20,
                'image' => 'shelters/default.jpg',
                'user_id' => 14,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'shelter_name' => 'Refugio Esperanza',
                'responsible_person' => 'Laura Torres',
                'capacity' => 100,
                'rating' => 4.6,
                'review_count' => 18,
                'image' => 'shelters/default.jpg',
                'user_id' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'shelter_name' => 'Casa Patitas',
                'responsible_person' => 'Andrés Gómez',
                'capacity' => 60,
                'rating' => 4.7,
                'review_count' => 10,
                'image' => 'shelters/default.jpg',
                'user_id' => 16,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'shelter_name' => 'Protectores de Animales',
                'responsible_person' => 'Sofía Herrera',
                'capacity' => 120,
                'rating' => 4.9,
                'review_count' => 25,
                'image' => 'shelters/default.jpg',
                'user_id' => 17,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('shelters')->insert($shelters);
    }
}
