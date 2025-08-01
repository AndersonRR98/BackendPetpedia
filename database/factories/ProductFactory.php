<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use App\Models\Veterinary;
use App\Models\Shoppingcar;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name'           => $this->faker->word(),
            'description'    => $this->faker->sentence(),
            'price'          => $this->faker->randomFloat(2, 5, 500),
           'image' => 'pets/default.jpg', 
            'category_id'    => Category::factory(),
            'veterinary_id'  => Veterinary::factory(),
            'shoppingcar_id' => Shoppingcar::factory(),
        ];
    }
}
