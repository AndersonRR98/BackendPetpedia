<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ShelterFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->company . ' Shelter',
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'address' => $this->faker->address,
            'responsible' => $this->faker->name,
        ];
    }
}
