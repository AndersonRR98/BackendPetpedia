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
        ];

        DB::table('appointments')->insert($appointments);
    }
}