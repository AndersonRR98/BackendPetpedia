<?php

namespace Database\Factories;

use App\Models\Requestt;
use App\Models\User;
use App\Models\Adoption;
use Illuminate\Database\Eloquent\Factories\Factory;

class RequesttFactory extends Factory
{
    protected $model = Requestt::class;

    public function definition(): array
    {
        return [
            'priority' => $this->faker->randomElement(['low', 'medium', 'high', 'urgent']),
            'application_status' => $this->faker->randomElement(['accepted', 'finished']),
            'adoption_id' => Adoption::inRandomOrder()->first()?->id,
            'user_id' => User::inRandomOrder()->first()?->id,
        ];
    }
}
