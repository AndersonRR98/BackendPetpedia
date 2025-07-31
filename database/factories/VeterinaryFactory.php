<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
class VeterinaryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'schedules' => json_encode(['08:00-17:00', '08:00-17:00', '08:00-17:00']),
             'user_id' => User::inRandomOrder()->first()?->id,
        ];
    }
}
