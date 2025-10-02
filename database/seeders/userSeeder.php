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
        // 1. VETERINARIOS - Datos específicos de veterinarios
        $this->createVeterinarians();

        // 2. ENTRENADORES - Datos específicos de entrenadores  
        $this->createTrainers();

        // 3. REFUGIOS - Datos específicos de refugios
        $this->createShelters();

        // 4. CLIENTES - Datos específicos de clientes
        $this->createClients();

        $this->command->info('✅ Usuarios y perfiles creados exitosamente!');
        $this->showSummary();
    }

    private function createVeterinarians(): void
    {
        $veterinarians = [
            [
                'name' => 'Dr. Carlos Mendoza',
                'email' => 'dr.mendoza@vetpedia.com',
                'profile' => [
                    'clinic_name' => 'Clínica Veterinaria Central',
                    'veterinary_license' => 'VET-12345',
                    'specialization' => 'Cirugía General',
                    'phone' => '+1-234-567-8901',
                    'address' => 'Av. Principal 123, Ciudad',
                    'biography' => 'Cirujano veterinario con 10 años de experiencia en procedimientos complejos.',
                ]
            ],
            [
                'name' => 'Dra. Ana López',
                'email' => 'dra.lopez@vetpedia.com', 
                'profile' => [
                    'clinic_name' => 'Hospital Animal San Francisco',
                    'veterinary_license' => 'VET-67890',
                    'specialization' => 'Dermatología',
                    'phone' => '+1-234-567-8902',
                    'address' => 'Calle Secundaria 456, Ciudad',
                    'biography' => 'Especialista en dermatología animal y alergias.',
                ]
            ],
            [
                'name' => 'Dr. Roberto García',
                'email' => 'dr.garcia@vetpedia.com',
                'profile' => [
                    'clinic_name' => 'Centro Veterinario Moderno',
                    'veterinary_license' => 'VET-54321',
                    'specialization' => 'Cardiología',
                    'phone' => '+1-234-567-8903',
                    'address' => 'Plaza Central 789, Ciudad',
                    'biography' => 'Cardiólogo veterinario especializado en enfermedades cardíacas.',
                ]
            ]
        ];

        foreach ($veterinarians as $vetData) {
            $user = User::create([
                'name' => $vetData['name'],
                'email' => $vetData['email'],
                'password' => Hash::make('password'),
                'role_id' => 1, // Veterinario
                'email_verified_at' => now(),
            ]);

            Profile::create(array_merge($vetData['profile'], [
                'user_id' => $user->id,
                'schedules' => json_encode($this->getVetSchedule()),
            ]));
        }
    }

    private function createTrainers(): void
    {
        $trainers = [
            [
                'name' => 'María González',
                'email' => 'maria.trainer@petpedia.com',
                'profile' => [
                    'specialty' => 'Adiestramiento Canino',
                    'experience_years' => 8,
                    'qualifications' => 'Certificación Internacional en Modificación de Conducta',
                    'hourly_rate' => 45.00,
                    'phone' => '+1-234-567-8904',
                    'address' => 'Av. del Parque 321, Ciudad',
                    'biography' => 'Entrenadora especializada en modificación de conducta canina.',
                ]
            ],
            [
                'name' => 'Javier Rodríguez',
                'email' => 'javier.trainer@petpedia.com',
                'profile' => [
                    'specialty' => 'Agility y Obediencia',
                    'experience_years' => 12,
                    'qualifications' => 'Licenciatura en Etología Animal',
                    'hourly_rate' => 55.00,
                    'phone' => '+1-234-567-8905',
                    'address' => 'Calle Deportiva 654, Ciudad',
                    'biography' => 'Especialista en agility y entrenamiento deportivo canino.',
                ]
            ]
        ];

        foreach ($trainers as $trainerData) {
            $user = User::create([
                'name' => $trainerData['name'],
                'email' => $trainerData['email'],
                'password' => Hash::make('password'),
                'role_id' => 2, // Entrenador
                'email_verified_at' => now(),
            ]);

            Profile::create(array_merge($trainerData['profile'], [
                'user_id' => $user->id,
            ]));
        }
    }

    private function createShelters(): void
    {
        $shelters = [
            [
                'name' => 'Refugio Patitas Contentas',
                'email' => 'info@patitascontentas.org',
                'profile' => [
                    'shelter_name' => 'Refugio Patitas Contentas',
                    'responsible_person' => 'Laura Martínez',
                    'capacity' => 50,
                    'phone' => '+1-234-567-8906',
                    'address' => 'Camino Rural 987, Zona Norte',
                    'biography' => 'Refugio dedicado al rescate y adopción de animales abandonados.',
                ]
            ],
            [
                'name' => 'Santuario Animal Esperanza',
                'email' => 'contacto@esperanzaanimal.org',
                'profile' => [
                    'shelter_name' => 'Santuario Animal Esperanza',
                    'responsible_person' => 'Carlos Ruiz',
                    'capacity' => 75,
                    'phone' => '+1-234-567-8907',
                    'address' => 'Carretera Este 654, Área Rural',
                    'biography' => 'Santuario que brinda hogar permanente a animales con necesidades especiales.',
                ]
            ]
        ];

        foreach ($shelters as $shelterData) {
            $user = User::create([
                'name' => $shelterData['name'],
                'email' => $shelterData['email'],
                'password' => Hash::make('password'),
                'role_id' => 4, // Refugio
                'email_verified_at' => now(),
            ]);

            Profile::create(array_merge($shelterData['profile'], [
                'user_id' => $user->id,
            ]));
        }
    }

    private function createClients(): void
    {
        $clients = [
            ['name' => 'Ana García', 'email' => 'ana.client@petpedia.com'],
            ['name' => 'Pedro López', 'email' => 'pedro.client@petpedia.com'],
            ['name' => 'María Rodríguez', 'email' => 'maria.client@petpedia.com'],
            ['name' => 'Carlos Martínez', 'email' => 'carlos.client@petpedia.com'],
            ['name' => 'Laura Hernández', 'email' => 'laura.client@petpedia.com'],
        ];

        $petPreferences = [
            'Perros de raza pequeña', 'Gatos', 'Aves exóticas', 
            'Reptiles', 'Animales de granja', 'Todo tipo de mascotas'
        ];

        $addresses = [
            'Av. Central 123, Ciudad',
            'Calle Norte 456, Ciudad', 
            'Plaza Sur 789, Ciudad',
            'Boulevard Este 321, Ciudad',
            'Camino Oeste 654, Ciudad'
        ];

        foreach ($clients as $index => $clientData) {
            $user = User::create([
                'name' => $clientData['name'],
                'email' => $clientData['email'],
                'password' => Hash::make('password'),
                'role_id' => 3, // Cliente
                'email_verified_at' => now(),
            ]);

            Profile::create([
                'user_id' => $user->id,
                'phone' => '+1-234-567-89' . rand(10, 99),
                'address' => $addresses[$index], // Usar array de direcciones predefinidas
                'pet_preferences' => $petPreferences[array_rand($petPreferences)], // Selección aleatoria
                'emergency_contact' => '+1-234-567-0000',
                'biography' => $clientData['name'] . ' es un amante de los animales y dueño responsable.',
            ]);
        }
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

    private function showSummary(): void
    {
        $counts = User::with('role')->get()->groupBy('role.name')->map->count();
        
        $this->command->info('📊 Resumen de usuarios creados:');
        foreach ($counts as $role => $count) {
            $this->command->info("   - {$count} {$role}");
        }
        $this->command->info("   Total: " . User::count() . " usuarios");
        
        // Verificar que los perfiles tengan datos correctos
        $this->command->info('🔍 Verificación de perfiles:');
        $this->command->info("   - Veterinarios con clínica: " . Profile::whereNotNull('clinic_name')->count());
        $this->command->info("   - Entrenadores con especialidad: " . Profile::whereNotNull('specialty')->count());
        $this->command->info("   - Refugios con nombre: " . Profile::whereNotNull('shelter_name')->count());
        $this->command->info("   - Clientes con preferencias: " . Profile::whereNotNull('pet_preferences')->count());
    }
}