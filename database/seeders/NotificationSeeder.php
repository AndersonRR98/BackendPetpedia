<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationSeeder extends Seeder
{
    public function run(): void
    {
        $notifications = [
            [
                'title' => 'Cita Veterinaria Confirmada',
                'description' => 'Tu cita con VetCare Centro ha sido confirmada para el 20 de Enero a las 10:00 AM',
                'user_id' => 1,
                'appointment_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Recordatorio de Vacunación',
                'description' => 'No olvides la vacuna anual de Bobby que vence el próximo mes',
                'user_id' => 1,
                'appointment_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Solicitud de Adopción Actualizada',
                'description' => 'El estado de tu solicitud para adoptar a Max ha cambiado a "En revisión"',
                'user_id' => 2,
                'appointment_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Sesión de Entrenamiento Cancelada',
                'description' => 'Tu sesión de entrenamiento del 26 de Enero ha sido cancelada',
                'user_id' => 3,
                'appointment_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('notifications')->insert($notifications);
    }
}