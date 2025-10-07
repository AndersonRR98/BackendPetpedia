<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Alimentos',
                'description' => 'Comida y snacks para perros, gatos y otras mascotas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Juguetes',
                'description' => 'Juguetes interactivos, pelotas, mordedores y más',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Salud e Higiene',
                'description' => 'Productos de cuidado, higiene y salud para mascotas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Accesorios',
                'description' => 'Collares, correas, camas, transportadoras y más',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Farmacia Veterinaria',
                'description' => 'Medicamentos y productos farmacéuticos para mascotas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}