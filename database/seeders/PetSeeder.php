<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetSeeder extends Seeder
{
    public function run(): void
    {
        $pets = [
            // Mascotas en refugio para adopción
            [
                'name' => 'Max',
                'age' => '2 años',
                'species' => 'Perro',
                'breed' => 'Labrador Retriever',
                'size' => 25.5,
                'sex' => 'Macho',
                'description' => 'Labrador juguetón y energético. Le encanta correr y jugar con pelotas. Muy cariñoso con las personas.',
                'image' =>'pets/default.jpg',
                'birth_date' => '2021-05-15',
                'shelter_id' => 1,
                'user_id' => null,
                'veterinary_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Luna',
                'age' => '1 año',
                'species' => 'Gato',
                'breed' => 'Siamés',
                'size' => 4.2,
                'sex' => 'Hembra',
                'description' => 'Gata siamesa tranquila y curiosa. Se lleva bien con otros gatos y niños. Le gusta dormir en lugares altos.',
                'image' => 'pets/default.jpg',
                'birth_date' => '2022-08-20',
                'shelter_id' => 1,
                'user_id' => null,
                'veterinary_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rocky',
                'age' => '3 años',
                'species' => 'Perro',
                'breed' => 'Bulldog Francés',
                'size' => 12.0,
                'sex' => 'Macho',
                'description' => 'Bulldog francés tranquilo y amigable. Perfecto para departamento. Le encanta dormir y pasear tranquilo.',
                'image' =>'pets/default.jpg',
                'birth_date' => '2020-03-10',
                'shelter_id' => 2,
                'user_id' => null,
                'veterinary_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Mascotas con dueño
            [
                'name' => 'Bobby',
                'age' => '4 años',
                'species' => 'Perro',
                'breed' => 'Golden Retriever',
                'size' => 28.0,
                'sex' => 'Macho',
                'description' => 'Golden retriever familiar, muy juguetón y protector. Le encanta el agua y jugar en el parque.',
                'image' => 'pets/default.jpg',
                'birth_date' => '2019-07-12',
                'shelter_id' => null,
                'user_id' => 1,
                'veterinary_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mimi',
                'age' => '2 años',
                'species' => 'Gato',
                'breed' => 'Mestizo',
                'size' => 3.8,
                'sex' => 'Hembra',
                'description' => 'Gata mestiza cariñosa e independiente. Le gusta observar desde la ventana y tomar el sol.',
                'image' => 'pets/default.jpg',
                'birth_date' => '2021-11-05',
                'shelter_id' => null,
                'user_id' => 2,
                'veterinary_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('pets')->insert($pets);
    }
}