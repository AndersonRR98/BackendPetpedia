<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name' => 'Consulta Veterinaria General',
                'price' => 45.00,
                'description' => 'Consulta médica general para evaluación de salud de tu mascota',
                'duration' => now()->setTime(0, 30),
                'trainer_id' => null,
                'requestt_id' => null,
                'veterinary_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sesión de Entrenamiento Básico',
                'price' => 60.00,
                'description' => 'Sesión individual de 1 hora para entrenamiento básico de obediencia',
                'duration' => now()->setTime(1, 0),
                'trainer_id' => 1,
                'requestt_id' => null,
                'veterinary_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vacunación Anual',
                'price' => 35.00,
                'description' => 'Aplicación de vacunas anuales obligatorias',
                'duration' => now()->setTime(0, 20),
                'trainer_id' => null,
                'requestt_id' => 3,
                'veterinary_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Curso de Agility Inicial',
                'price' => 120.00,
                'description' => 'Curso de 4 sesiones de agility para perros',
                'duration' => now()->setTime(1, 30),
                'trainer_id' => 2,
                'requestt_id' => null,
                'veterinary_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('services')->insert($services);
    }
}