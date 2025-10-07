<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Royal Canin Medium Adult',
                'description' => 'Alimento balanceado para perros adultos de raza mediana (10-25kg)',
                'price' => 85.99,
                'image' => 'pets/default.jpg',
                'category_id' => 1,
                'veterinary_id' => 1,
                'shoppingcar_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Purina Pro Plan Gatitos',
                'description' => 'Alimento para gatitos hasta 1 año, fórmula con pollo y arroz',
                'price' => 45.50,
                'image' =>'pets/default.jpg',
                'category_id' => 1,
                'veterinary_id' => 2,
                'shoppingcar_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pelota interactiva con sonido',
                'description' => 'Pelota resistente para perros con sonido divertido',
                'price' => 15.75,
                'image' => 'pets/default.jpg',
                'category_id' => 2,
                'veterinary_id' => null,
                'shoppingcar_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rascador para gatos 3 niveles',
                'description' => 'Rascador vertical con plataformas y juguete colgante',
                'price' => 120.00,
                'image' =>'pets/default.jpg',
                'category_id' => 2,
                'veterinary_id' => null,
                'shoppingcar_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Shampoo antipulgas',
                'description' => 'Shampoo medicinal para control de pulgas y garrapatas',
                'price' => 28.90,
                'image' => 'pets/default.jpg',
                'category_id' => 3,
                'veterinary_id' => 1,
                'shoppingcar_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cepillo deslanador',
                'description' => 'Cepillo profesional para remover pelo suelto de perros y gatos',
                'price' => 35.00,
                'image' => 'pets/default.jpg',
                'category_id' => 3,
                'veterinary_id' => null,
                'shoppingcar_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('products')->insert($products);
    }
}