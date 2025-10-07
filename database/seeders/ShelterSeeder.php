<?php

namespace Database\Seeders;

use App\Models\Shelter;
use Illuminate\Database\Seeder;

class ShelterSeeder extends Seeder
{
    public function run(): void
    {
        $shelters = [
            [
                'name' => 'Refugio Patitas Felices',
                'phone' => '+34 911 234 567',
                'email' => 'info@patitasfelices.com',
                'address' => 'Carretera Norte km 5, 28001 Madrid',
                'responsible' => 'María López',
            ],
            [
                'name' => 'Hogar Animal Rescue',
                'email' => 'adopciones@hogaranimal.com',
                'phone' => '+34 922 345 678',
                'address' => 'Camino Viejo 123, 08001 Barcelona',
                'responsible' => 'Carlos Ramírez',
            ],
            [
                'name' => 'Amigos de los Animales',
                'email' => 'contacto@amigosanimales.org',
                'phone' => '+34 933 456 789',
                'address' => 'Avenida del Parque 45, 46001 Valencia',
                'responsible' => 'Laura Sánchez',
            ]
        ];

        foreach ($shelters as $shelter) {
            Shelter::create($shelter);
        }
    }
}
