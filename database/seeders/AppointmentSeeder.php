<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentSeeder extends Seeder
{
    public function run(): void
    {
        // Obtener todos los IDs existentes de veterinarias y trainers
        $veterinaries = DB::table('veterinaries')->get();
        $trainers = DB::table('trainers')->get();

        // Verificar que hay registros
        if ($veterinaries->isEmpty() || $trainers->isEmpty()) {
            $this->command->info('No hay veterinarias o trainers en la base de datos.');
            return;
        }

        $appointments = [
            [
                'date' => '2024-01-20',
                'description' => '10:00 - Consulta general y evaluación de comportamiento',
                'status' => 'confirmed',
                'trainer_id' => $trainers[0]->id, // Primer trainer
                'veterinary_id' => $veterinaries[0]->id, // Primera veterinaria
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'date' => '2024-01-22',
                'description' => '15:30 - Vacunación anual y sesión de agilidad',
                'status' => 'pending',
                'trainer_id' => $trainers[1]->id, // Segundo trainer
                'veterinary_id' => $veterinaries[1]->id, // Segunda veterinaria
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'date' => '2024-01-25',
                'description' => '09:00 - Chequeo pre-entrenamiento y sesión de guardia',
                'status' => 'confirmed',
                'trainer_id' => $trainers[2]->id, // Tercer trainer
                'veterinary_id' => $veterinaries[2]->id, // Tercera veterinaria
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'date' => '2024-01-26',
                'description' => '11:00 - Evaluación física y entrenamiento para cachorros',
                'status' => 'cancelled',
                'trainer_id' => $trainers[3]->id, // Cuarto trainer
                'veterinary_id' => $veterinaries[3]->id, // Cuarta veterinaria
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