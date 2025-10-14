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
                'shelter_name' => 'Refugio Patitas Felices',
                'responsible_person' => 'María López',
                'capacity' => 50,
                'rating' => 4.5,
                'review_count' => 12,
                'image' => 'shelters/default.jpg',
                'user_id' => 17, // ✅ Corregido: María López (refugio)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'shelter_name' => 'Hogar Animal',
                'responsible_person' => 'Carlos Ramírez',
                'capacity' => 80,
                'rating' => 4.8,
                'review_count' => 20,
                'image' => 'shelters/default.jpg',
                'user_id' => 18, // ✅ Corregido: Carlos Ramírez (refugio)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'shelter_name' => 'Amigos Animales',
                'responsible_person' => 'Laura Sánchez',
                'capacity' => 100,
                'rating' => 4.6,
                'review_count' => 18,
                'image' => 'shelters/default.jpg',
                'user_id' => 19, // ✅ Corregido: Laura Sánchez (refugio)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'shelter_name' => 'Animal Refuge',
                'responsible_person' => 'Pedro Gómez',
                'capacity' => 60,
                'rating' => 4.7,
                'review_count' => 10,
                'image' => 'shelters/default.jpg',
                'user_id' => 20, // ✅ Corregido: Pedro Gómez (refugio)
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('shelters')->insert($shelters);
    }
}