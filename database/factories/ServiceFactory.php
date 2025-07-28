<?php

namespace Database\Factories;

use App\Models\Service;
use App\Models\Trainer;
use App\Models\Requestt;
use App\Models\Veterinary;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    protected $model = Service::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 10, 500),
            'description' => $this->faker->paragraph,
            'duration' => $this->faker->dateTime,
            'trainer_id' => Trainer::inRandomOrder()->first()?->id,
            'requestt_id' => Requestt::inRandomOrder()->first()?->id,
            'veterinary_id' => Veterinary::inRandomOrder()->first()?->id,
        ];
    }
}
