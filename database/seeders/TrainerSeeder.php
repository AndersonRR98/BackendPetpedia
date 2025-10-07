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
                'name' => 'Miguel Torres',
                'specialty' => 'Adiestramiento canino básico y avanzado',
                'experience' => 8,
                'qualifications' => 'Certificado en Adiestramiento Canino - Universidad Nacional, Especialización en comportamiento animal',
                'phone' => '+57 1 2345678',
                'email' => 'miguel.torres@dogtrainer.com',
                'biography' => 'Más de 8 años de experiencia en adiestramiento canino. Especializado en modificación de conducta y entrenamiento de obediencia.',
                'rating' => 4.8,
                'image' => 'pets/default.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Carolina Rojas',
                'specialty' => 'Entrenamiento para agilidad y deportes caninos',
                'experience' => 5,
                'qualifications' => 'Licenciada en Zootecnia, Certificación Internacional en Entrenamiento Canino',
                'phone' => '+57 1 3456789',
                'email' => 'carolina.rojas@agilitytrainer.com',
                'biography' => 'Entrenadora especializada en deportes caninos y agilidad. Campeona nacional en competencias de agility.',
                'rating' => 4.6,
                'image' => 'pets/default.jpg', // ruta definida 
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('trainers')->insert($trainers);
    }
}
