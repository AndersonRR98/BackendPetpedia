<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdoptionSeeder extends Seeder
{
    public function run(): void
    {
        $adoptions = [
            [
                'status' => 'pending',
                'comment' => 'Familia interesada en adoptar a Max. Tenemos jardín y experiencia con labradores.',
                'pet_id' => 1,
                'shelter_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'status' => 'approved',
                'comment' => 'Adopción aprobada. Luna se va a un hogar con otro gato para compañía.',
                'pet_id' => 2,
                'shelter_id' => 1,
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(2),
            ],
            [
                'status' => 'rejected',
                'comment' => 'Solicitud rechazada - el solicitante no cumple con los requisitos de espacio.',
                'pet_id' => 3,
                'shelter_id' => 2,
                'created_at' => now()->subDays(10),
                'updated_at' => now()->subDays(8),
            ],

            [
                'status' => 'pending',
                'comment' => 'Pareja joven interesada en adoptar a Bella. Viven cerca de un parque y tienen tiempo para paseos diarios.',
                'pet_id' => 4,
                'shelter_id' => 2,
                'created_at' => now()->subDays(1),
                'updated_at' => now(),
            ],
            [
                'status' => 'pending',
                'comment' => 'Familia con niños pequeños quiere adoptar a Simba. Buscan un gato sociable y tranquilo.',
                'pet_id' => 5,
                'shelter_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('adoptions')->insert($adoptions);
    }
}
