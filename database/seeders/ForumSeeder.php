<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ForumSeeder extends Seeder
{
    public function run(): void
    {
        $forums = [
            [
                'title' => 'Cuidados Básicos de Mascotas',
                'description' => 'Comparte y aprende sobre los cuidados esenciales para mantener saludables a tus mascotas',
                'creation_date' => now(),
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Adiestramiento y Comportamiento',
                'description' => 'Discusiones sobre técnicas de adiestramiento y solución de problemas de comportamiento',
                'creation_date' => now(),
                'user_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Salud y Veterinaria',
                'description' => 'Consultas sobre salud animal, prevención de enfermedades y experiencias con veterinarios',
                'creation_date' => now(),
                'user_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Adopción Responsable',
                'description' => 'Información y experiencias sobre procesos de adopción y refugios',
                'creation_date' => now(),
                'user_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('forums')->insert($forums);
    }
}