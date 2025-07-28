<?php

namespace Database\Factories;

use App\Models\Shoppingcar;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShoppingcarFactory extends Factory
{
    protected $model = Shoppingcar::class;

    public function definition(): array
    {
        return [
            'amount' => $this->faker->randomFloat(2, 5, 1000),
            'date' => $this->faker->date(),
            'user_id' => User::inRandomOrder()->first()?->id,
        ];
    }
}
