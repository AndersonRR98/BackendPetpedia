<?php
// database/seeders/ProfileSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        // Obtener todos los usuarios sin importar el rol
        $users = User::all();

        foreach ($users as $user) {
            Profile::create([
                'user_id'   => $user->id,
                'photo'     => $this->generatePhoto($user->role_id, $user->id),
                'phone'     => $this->generatePhone(),
                'address'   => $this->generateAddress(),
                'biography' => $this->generateBiography($user->role_id),
            ]);
        }
    }

    // -------------------- Helpers --------------------
    private function generatePhoto(int $roleId, int $userId): string
    {
        switch ($roleId) {
            case 1: return "clients/client_$userId.jpg";
            case 2: return "veterinarians/vet_$userId.jpg";
            case 3: return "trainers/trainer_$userId.jpg";
            case 4: return "shelters/shelter_$userId.jpg";
            default: return "default/user_$userId.jpg";
        }
    }

    private function generatePhone(): string
    {
        return '+34 ' . rand(600, 699) . ' ' . sprintf('%06d', rand(0, 999999));
    }

    private function generateAddress(): string
    {
        $streets = ['Calle Mayor', 'Avenida de la Libertad', 'Plaza España', 'Calle Real', 'Paseo del Prado'];
        $cities  = ['Madrid', 'Barcelona', 'Valencia', 'Sevilla', 'Zaragoza'];

        return $streets[array_rand($streets)] . ', ' . rand(1, 100) . ', ' . $cities[array_rand($cities)];
    }

    private function generateBiography(int $roleId): string
    {
        $biographies = [
            1 => [
                'Cliente responsable con experiencia en cuidado de mascotas.',
                'Amante de los animales, siempre buscando el bienestar de sus mascotas.',
                'Dueño dedicado a proporcionar un hogar feliz a sus mascotas.'
            ],
            2 => [
                'Veterinario con amplia experiencia en medicina general y cirugía.',
                'Especializado en prevención y bienestar animal.',
                'Comprometido con la salud de los animales.'
            ],
            3 => [
                'Entrenador con técnicas modernas de adiestramiento positivo.',
                'Experto en modificación de conducta y socialización.',
                'Apasionado por mejorar la relación entre dueños y mascotas.'
            ],
            4 => [
                'Refugio dedicado al rescate y adopción responsable.',
                'Organización sin ánimo de lucro comprometida con los animales.',
                'Buscamos siempre un hogar para cada mascota.'
            ]
        ];

        return $biographies[$roleId][array_rand($biographies[$roleId])] ?? 'Usuario de la plataforma.';
    }
}
