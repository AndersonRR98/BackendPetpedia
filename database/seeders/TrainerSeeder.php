<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrainerSeeder extends Seeder
{
    public function run(): void
    {
        $trainers = [
            [
                'specialty' => 'Adiestramiento canino básico y avanzado',
                'experience_years' => 8,
                'qualifications' => 'Certificado en Adiestramiento Canino - Universidad Nacional',
                'hourly_rate' => 50.00,
                'rating' => 4.8,
                'review_count' => 120,
                'image' => 'trainers/miguel_torres.jpg',
                'user_id' => 13,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'specialty' => 'Entrenamiento en agilidad y deportes caninos',
                'experience_years' => 5,
                'qualifications' => 'Licenciada en Zootecnia, Certificación Internacional en Agility',
                'hourly_rate' => 45.00,
                'rating' => 4.6,
                'review_count' => 95,
                'image' => 'trainers/carolina_rojas.jpg',
                'user_id' => 14,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'specialty' => 'Entrenamiento de perros guardianes',
                'experience_years' => 10,
                'qualifications' => 'Instructor certificado por la Policía Nacional',
                'hourly_rate' => 60.00,
                'rating' => 4.9,
                'review_count' => 150,
                'image' => 'trainers/juan_perez.jpg',
                'user_id' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'specialty' => 'Entrenamiento positivo para cachorros',
                'experience_years' => 4,
                'qualifications' => 'Certificada en adiestramiento positivo',
                'hourly_rate' => 40.00,
                'rating' => 4.5,
                'review_count' => 80,
                'image' => 'trainers/lucia_fernandez.jpg',
                'user_id' => 16,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('trainers')->insert($trainers);
    }
}
