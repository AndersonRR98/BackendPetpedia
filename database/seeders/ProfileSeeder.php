<?php
// database/seeders/ProfileSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
      // Obtener usuarios existentes por rol usando la relación
$clients = User::where('role_id', 1)->get();
$veterinarians = User::where('role_id', 2)->get();
$trainers = User::where('role_id', 3)->get();
$shelters = User::where('role_id', 4)->get();

        // Crear perfiles para CLIENTES
        foreach ($clients as $client) {
            Profile::create([
                'user_id' => $client->id,
                'photo' => 'clients/client_' . $client->id . '.jpg',
                'phone' => $this->generatePhone(),
                'address' => $this->generateAddress(),
                'biography' => $this->generateBiography('client'),
                'pet_preferences' => $this->generatePetPreferences(),
                'emergency_contact' => $this->generatePhone(),
                'rating' => rand(0, 50) / 10, // 0.0 a 5.0
                'review_count' => rand(0, 100),
            ]);
        }

        // Crear perfiles para VETERINARIOS
        foreach ($veterinarians as $vet) {
            Profile::create([
                'user_id' => $vet->id,
                'photo' => 'veterinarians/vet_' . $vet->id . '.jpg',
                'phone' => $this->generatePhone(),
                'address' => $this->generateAddress(),
                'biography' => $this->generateBiography('veterinarian'),
                'clinic_name' => $this->generateClinicName(),
                'veterinary_license' => 'VET-' . strtoupper(bin2hex(random_bytes(5))),
                'specialization' => $this->generateVetSpecialization(),
                'schedules' => json_encode($this->generateSchedule()),
                'rating' => rand(30, 50) / 10, // 3.0 a 5.0
                'review_count' => rand(10, 200),
            ]);
        }

        // Crear perfiles para ENTRENADORES
        foreach ($trainers as $trainer) {
            Profile::create([
                'user_id' => $trainer->id,
                'photo' => 'trainers/trainer_' . $trainer->id . '.jpg',
                'phone' => $this->generatePhone(),
                'address' => $this->generateAddress(),
                'biography' => $this->generateBiography('trainer'),
                'specialty' => $this->generateTrainerSpecialty(),
                'experience_years' => rand(1, 20),
                'qualifications' => $this->generateQualifications(),
                'hourly_rate' => rand(25, 100) + (rand(0, 99) / 100),
                'rating' => rand(30, 50) / 10,
                'review_count' => rand(5, 150),
            ]);
        }

        // Crear perfiles para REFUGIOS
        foreach ($shelters as $shelter) {
            Profile::create([
                'user_id' => $shelter->id,
                'photo' => 'shelters/shelter_' . $shelter->id . '.jpg',
                'phone' => $this->generatePhone(),
                'address' => $this->generateAddress(),
                'biography' => $this->generateBiography('shelter'),
                'shelter_name' => $this->generateShelterName(),
                'responsible_person' => $this->generateName(),
                'capacity' => rand(10, 200),
                'rating' => rand(35, 50) / 10,
                'review_count' => rand(20, 300),
            ]);
        }
    }

    // Métodos auxiliares para generar datos ficticios
    private function generatePhone(): string
    {
        return '+34 ' . rand(600, 699) . ' ' . sprintf('%06d', rand(0, 999999));
    }

    private function generateAddress(): string
    {
        $streets = ['Calle Mayor', 'Avenida de la Libertad', 'Plaza España', 'Calle Real', 'Paseo del Prado'];
        $cities = ['Madrid', 'Barcelona', 'Valencia', 'Sevilla', 'Zaragoza'];
        
        return $streets[array_rand($streets)] . ', ' . rand(1, 100) . ', ' . $cities[array_rand($cities)];
    }

    private function generateBiography(string $role): string
    {
        $biographies = [
            'client' => [
                'Amante de los animales con experiencia en el cuidado de mascotas.',
                'Dueño responsable de varias mascotas a lo largo de mi vida.',
                'Apasionado por el bienestar animal y siempre buscando lo mejor para mis compañeros peludos.'
            ],
            'veterinarian' => [
                'Veterinario con amplia experiencia en medicina general y cirugía.',
                'Especializado en cuidado preventivo y medicina interna de pequeños animales.',
                'Comprometido con la salud y bienestar de todas las mascotas.'
            ],
            'trainer' => [
                'Entrenador certificado con técnicas modernas de adiestramiento positivo.',
                'Especialista en modificación de conducta y socialización de perros.',
                'Ayudo a fortalecer el vínculo entre dueños y sus mascotas mediante el entrenamiento.'
            ],
            'shelter' => [
                'Refugio comprometido con el rescate y adopción responsable de animales.',
                'Organización sin ánimo de lucro dedicada al bienestar animal desde hace años.',
                'Trabajamos para encontrar hogares amorosos para animales en situación de abandono.'
            ]
        ];

        return $biographies[$role][array_rand($biographies[$role])];
    }

    private function generatePetPreferences(): string
    {
        $pets = ['Perros', 'Gatos', 'Aves', 'Roedores', 'Reptiles'];
        $preferences = [];
        
        $count = rand(1, 3);
        for ($i = 0; $i < $count; $i++) {
            $preferences[] = $pets[array_rand($pets)];
        }
        
        return implode(', ', array_unique($preferences));
    }

    private function generateClinicName(): string
    {
        $names = [
            'Clínica Veterinaria Central',
            'Centro Veterinario San Francisco',
            'Veterinaria Los Álamos',
            'Clínica Animalia',
            'Veterinaria Moderna'
        ];
        
        return $names[array_rand($names)];
    }

    private function generateVetSpecialization(): string
    {
        $specializations = [
            'Medicina General',
            'Cirugía',
            'Dermatología',
            'Oftalmología',
            'Cardiología',
            'Odontología'
        ];
        
        return $specializations[array_rand($specializations)];
    }

    private function generateSchedule(): array
    {
        return [
            'monday' => ['09:00-14:00', '16:00-20:00'],
            'tuesday' => ['09:00-14:00', '16:00-20:00'],
            'wednesday' => ['09:00-14:00', '16:00-20:00'],
            'thursday' => ['09:00-14:00', '16:00-20:00'],
            'friday' => ['09:00-14:00', '16:00-20:00'],
            'saturday' => ['10:00-14:00'],
            'sunday' => 'Cerrado'
        ];
    }

    private function generateTrainerSpecialty(): string
    {
        $specialties = [
            'Obediencia básica',
            'Modificación de conducta',
            'Agility',
            'Socialización',
            'Entrenamiento para cachorros'
        ];
        
        return $specialties[array_rand($specialties)];
    }

    private function generateQualifications(): string
    {
        $qualifications = [
            'Certificado en Adiestramiento Canino',
            'Diplomado en Etología',
            'Curso avanzado de modificación de conducta',
            'Certificación internacional en entrenamiento positivo'
        ];
        
        return $qualifications[array_rand($qualifications)];
    }

    private function generateShelterName(): string
    {
        $names = [
            'Refugio Esperanza Animal',
            'Hogar de Mascotas San Roque',
            'Santuario Animal Luna',
            'Refugio Patitas Felices',
            'Albergue Animal Solidario'
        ];
        
        return $names[array_rand($names)];
    }

    private function generateName(): string
    {
        $names = ['María García', 'Carlos López', 'Ana Martínez', 'David Rodríguez', 'Laura Sánchez'];
        return $names[array_rand($names)];
    }
}