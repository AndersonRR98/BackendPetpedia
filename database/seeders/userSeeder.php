<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. VETERINARIOS con datos específicos
        $vets = [
            [
                'name' => 'Dr. Carlos Mendoza', 
                'email' => 'carlos.vet@petpedia.com',
                'profile' => [
                    'clinic_name' => 'Clínica Veterinaria Central',
                    'veterinary_license' => 'VET-12345',
                    'specialization' => 'Cirugía General',
                    'phone' => '+1-234-567-8901',
                    'address' => 'Av. Principal 123, Ciudad',
                    'biography' => 'Cirujano veterinario con 10 años de experiencia.',
                ]
            ],
            [
                'name' => 'Dra. Ana López',
                'email' => 'ana.vet@petpedia.com',
                'profile' => [
                    'clinic_name' => 'Hospital Animal San Francisco', 
                    'veterinary_license' => 'VET-67890',
                    'specialization' => 'Dermatología',
                    'phone' => '+1-234-567-8902',
                    'address' => 'Calle Secundaria 456, Ciudad',
                    'biography' => 'Especialista en dermatología animal.',
                ]
            ]
        ];

        foreach ($vets as $vet) {
            $user = User::create([
                'name' => $vet['name'],
                'email' => $vet['email'],
                'password' => Hash::make('password'),
                'role_id' => 1,
                'email_verified_at' => now(),
            ]);

            Profile::create(array_merge($vet['profile'], [
                'user_id' => $user->id,
                'schedules' => json_encode($this->getVetSchedule()),
            ]));
        }

        // 2. ENTRENADORES con datos específicos
        $trainers = [
            [
                'name' => 'María González',
                'email' => 'maria.trainer@petpedia.com',
                'profile' => [
                    'specialty' => 'Adiestramiento Canino',
                    'experience_years' => 8,
                    'qualifications' => 'Certificación Internacional',
                    'hourly_rate' => 45.00,
                    'phone' => '+1-234-567-8903',
                    'address' => 'Av. del Parque 321, Ciudad',
                    'biography' => 'Entrenadora especializada en modificación de conducta.',
                ]
            ]
        ];

        foreach ($trainers as $trainer) {
            $user = User::create([
                'name' => $trainer['name'],
                'email' => $trainer['email'],
                'password' => Hash::make('password'),
                'role_id' => 2,
                'email_verified_at' => now(),
            ]);

            Profile::create(array_merge($trainer['profile'], [
                'user_id' => $user->id,
            ]));
        }

        // 3. REFUGIOS con datos específicos
        $shelters = [
            [
                'name' => 'Refugio Patitas Contentas',
                'email' => 'info@patitascontentas.org',
                'profile' => [
                    'shelter_name' => 'Refugio Patitas Contentas',
                    'responsible_person' => 'Laura Martínez',
                    'capacity' => 50,
                    'phone' => '+1-234-567-8904',
                    'address' => 'Camino Rural 987, Zona Norte',
                    'biography' => 'Refugio dedicado al rescate de animales.',
                ]
            ]
        ];

        foreach ($shelters as $shelter) {
            $user = User::create([
                'name' => $shelter['name'],
                'email' => $shelter['email'],
                'password' => Hash::make('password'),
                'role_id' => 4,
                'email_verified_at' => now(),
            ]);

            Profile::create(array_merge($shelter['profile'], [
                'user_id' => $user->id,
            ]));
        }

        // 4. CLIENTES
        $clients = [
            ['name' => 'Ana García', 'email' => 'ana.client@petpedia.com'],
            ['name' => 'Pedro López', 'email' => 'pedro.client@petpedia.com'],
        ];

        foreach ($clients as $client) {
            $user = User::create([
                'name' => $client['name'],
                'email' => $client['email'],
                'password' => Hash::make('password'),
                'role_id' => 3,
                'email_verified_at' => now(),
            ]);

            Profile::create([
                'user_id' => $user->id,
                'phone' => '+1-234-567-89' . rand(10, 99),
                'address' => 'Dirección de ' . $client['name'],
                'pet_preferences' => 'Perros y gatos',
                'emergency_contact' => '+1-234-567-0000',
                'biography' => $client['name'] . ' - Amante de los animales.',
            ]);
        }

        $this->command->info('✅ Usuarios creados con datos específicos por rol');
    }

    private function getVetSchedule(): array
    {
        return [
            'lunes' => ['08:00-12:00', '14:00-18:00'],
            'martes' => ['08:00-12:00', '14:00-18:00'],
            'miercoles' => ['08:00-12:00'],
            'jueves' => ['08:00-12:00', '14:00-18:00'],
            'viernes' => ['08:00-12:00', '14:00-18:00'],
            'sabado' => ['09:00-13:00'],
            'domingo' => ['Cerrado']
        ];
    }
}