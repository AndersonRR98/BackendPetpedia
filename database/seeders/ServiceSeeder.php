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
            // Nuevos servicios para trainer 1
            [
                'name' => 'Entrenamiento Avanzado de Obediencia',
                'price' => 85.00,
                'description' => 'Sesión especializada en comandos avanzados y control en situaciones difíciles',
                'duration' => now()->setTime(1, 15),
                'trainer_id' => 1,
                'requestt_id' => null,
                'veterinary_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Corrección de Conducta',
                'price' => 75.00,
                'description' => 'Sesión para corregir problemas de comportamiento como ansiedad, agresividad o destructividad',
                'duration' => now()->setTime(1, 0),
                'trainer_id' => 1,
                'requestt_id' => null,
                'veterinary_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Socialización Canina',
                'price' => 50.00,
                'description' => 'Sesión grupal para mejorar la socialización con otros perros y personas',
                'duration' => now()->setTime(1, 30),
                'trainer_id' => 1,
                'requestt_id' => null,
                'veterinary_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Entrenamiento para Cachorros',
                'price' => 55.00,
                'description' => 'Programa especializado para cachorros de 2 a 6 meses',
                'duration' => now()->setTime(0, 45),
                'trainer_id' => 1,
                'requestt_id' => null,
                'veterinary_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Preparación para Competencias',
                'price' => 100.00,
                'description' => 'Entrenamiento especializado para perros que participarán en competencias caninas',
                'duration' => now()->setTime(1, 30),
                'trainer_id' => 1,
                'requestt_id' => null,
                'veterinary_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('services')->insert($services);
    }
}