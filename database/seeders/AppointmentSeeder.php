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
                'description' => 'Consulta general para vacunación anual y chequeo de salud completo de mi perro Labrador.',
                'status' => 'confirmed',
                'trainer_id' => null,
                'veterinary_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'date' => '2024-01-22',
                'description' => 'Mi gato presenta vómitos ocasionales y falta de apetito desde hace 3 días. Necesito diagnóstico.',
                'status' => 'pending',
                'trainer_id' => null,
                'veterinary_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'date' => '2024-01-25',
                'description' => 'Sesión de entrenamiento básico para mi cachorro de 4 meses. Enseñanza de comandos básicos y socialización.',
                'status' => 'confirmed',
                'trainer_id' => 1,
                'veterinary_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'date' => '2024-01-26',
                'description' => 'Entrenamiento avanzado de obediencia para mi perro adulto. Problemas de comportamiento con otros perros.',
                'status' => 'cancelled',
                'trainer_id' => 2,
                'veterinary_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'date' => '2024-01-28',
                'description' => 'Urgencia: Mi perro se lastimó la pata trasera durante el paseo. Cojea y no quiere apoyar la pata.',
                'status' => 'confirmed',
                'trainer_id' => null,
                'veterinary_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'date' => '2024-01-30',
                'description' => 'Castración programada para mi gata de 6 meses. Requiero información pre-operatoria.',
                'status' => 'pending',
                'trainer_id' => null,
                'veterinary_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'date' => '2024-02-01',
                'description' => 'Sesión de modificación de conducta para mi perro que tiene miedo a los ruidos fuertes.',
                'status' => 'confirmed',
                'trainer_id' => 3,
                'veterinary_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'date' => '2024-02-03',
                'description' => 'Chequeo dental rutinario y limpieza de dientes para mi perro de raza pequeña.',
                'status' => 'pending',
                'trainer_id' => null,
                'veterinary_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('appointments')->insert($appointments);
    }
}