<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            // Clientes
            [
                'name' => 'María González',
                'email' => 'maria.gonzalez@email.com',
                'password' => Hash::make('password123'),
                'role_id' => 1,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Carlos Rodríguez',
                'email' => 'carlos.rodriguez@email.com',
                'password' => Hash::make('password123'),
                'role_id' => 1,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ana Martínez',
                'email' => 'ana.martinez@email.com',
                'password' => Hash::make('password123'),
                'role_id' => 1,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Veterinarias existentes
            [
                'name' => 'Dr. Roberto Silva',
                'email' => 'roberto.silva@vetcare.com',
                'password' => Hash::make('password123'),
                'role_id' => 2,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dra. Laura Mendoza',
                'email' => 'laura.mendoza@animalclinic.com',
                'password' => Hash::make('password123'),
                'role_id' => 2,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dr. Andrés Herrera',
                'email' => 'andres.herrera@sanopet.com',
                'password' => Hash::make('password123'),
                'role_id' => 2,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dra. Sofía Ramírez',
                'email' => 'sofia.ramirez@petclinic.com',
                'password' => Hash::make('password123'),
                'role_id' => 2,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Veterinarias nuevas (para que cuadren con el VeterinarySeeder)
            [
                'name' => 'Dr. Felipe Cortés',
                'email' => 'felipe.cortes@happypets.com',
                'password' => Hash::make('password123'),
                'role_id' => 2,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dra. Natalia Torres',
                'email' => 'natalia.torres@animalhealth.com',
                'password' => Hash::make('password123'),
                'role_id' => 2,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dr. Santiago Vargas',
                'email' => 'santiago.vargas@clinivet.com',
                'password' => Hash::make('password123'),
                'role_id' => 2,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dra. Camila Duarte',
                'email' => 'camila.duarte@mundoanimal.com',
                'password' => Hash::make('password123'),
                'role_id' => 2,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dr. Esteban Morales',
                'email' => 'esteban.morales@vetplus.com',
                'password' => Hash::make('password123'),
                'role_id' => 2,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Entrenadores
            [
                'name' => 'Miguel Torres',
                'email' => 'miguel.torres@dogtrainer.com',
                'password' => Hash::make('password123'),
                'role_id' => 3,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Carolina Rojas',
                'email' => 'carolina.rojas@agilitytrainer.com',
                'password' => Hash::make('password123'),
                'role_id' => 3,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Juan Pérez',
                'email' => 'juan.perez@obedienciacanina.com',
                'password' => Hash::make('password123'),
                'role_id' => 3,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lucía Fernández',
                'email' => 'lucia.fernandez@caninocoach.com',
                'password' => Hash::make('password123'),
                'role_id' => 3,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Refugios
            [
                'name' => 'María López',
                'email' => 'info@patitasfelices.com',
                'password' => Hash::make('password123'),
                'role_id' => 4,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Carlos Ramírez',
                'email' => 'adopciones@hogaranimal.com',
                'password' => Hash::make('password123'),
                'role_id' => 4,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Laura Sánchez',
                'email' => 'contacto@amigosanimales.org',
                'password' => Hash::make('password123'),
                'role_id' => 4,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pedro Gómez',
                'email' => 'pedro.gomez@animalrefuge.com',
                'password' => Hash::make('password123'),
                'role_id' => 4,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('users')->insert($users);
    }
}
