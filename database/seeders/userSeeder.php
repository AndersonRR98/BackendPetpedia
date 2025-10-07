<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

            // Veterinarias
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

            // Refugios
            [
                'name' => 'Refugio Patitas Felices',
                'email' => 'contacto@patitasfelices.org',
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