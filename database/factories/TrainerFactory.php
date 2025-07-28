<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TrainerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'specialty' => $this->faker->word,
            'experience' => $this->faker->numberBetween(1, 20),
            'qualifications' => $this->faker->sentence(6),
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'biography' => $this->faker->paragraph,
        ];
    }
}
