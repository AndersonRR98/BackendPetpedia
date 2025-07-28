<?php

namespace Database\Factories;

use App\Models\Appointment;
use App\Models\Trainer;
use App\Models\Veterinary;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    protected $model = Appointment::class;

    public function definition(): array
    {
        return [
            'date' => $this->faker->date(),
            'description' => $this->faker->time(), // porque el campo es `time`
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'cancelled']),
            'trainer_id' => Trainer::inRandomOrder()->first()?->id,
            'veterinary_id' => Veterinary::inRandomOrder()->first()?->id,
        ];
    }
}
