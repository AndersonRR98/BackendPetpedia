<?php

namespace Database\Factories;

use App\Models\Pet;
use App\Models\shelter;
use App\Models\User;
use App\Models\veterinary;
use Illuminate\Database\Eloquent\Factories\Factory;

class PetFactory extends Factory
{
    protected $model = Pet::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName,
            'age' => $this->faker->numberBetween(1, 15) . ' años',
            'species' => $this->faker->randomElement(['Perro', 'Gato']),
            'breed' => $this->faker->word,
            'size' => $this->faker->randomFloat(2, 3.0, 40.0),
            'sex' => $this->faker->randomElement(['Macho', 'Hembra']),
            'description' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl,
            'birth_date' => $this->faker->date(),
            'user_id' => User::inRandomOrder()->value('id'),
            'veterinary_id' => veterinary::inRandomOrder()->value('id'),
            'shelter_id' => shelter::inRandomOrder()->value('id'),


        ];
    }
}
