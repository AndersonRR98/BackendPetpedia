<?php

namespace Database\Factories;

use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class InventoryFactory extends Factory
{
    protected $model = Inventory::class;

    public function definition(): array
    {
        return [
            'available_quantities' => $this->faker->numberBetween(1, 500),
            'product_id' => Product::factory(),
        ];
    }
}
