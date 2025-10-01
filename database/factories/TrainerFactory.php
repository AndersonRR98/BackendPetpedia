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
            'rating' => $this->faker->randomFloat(1, 3.0, 5.0), 
           'image' => 'pets/default.jpg', // Imagen almacenada en /storage/app/public/pets/


        ];
    }
}
