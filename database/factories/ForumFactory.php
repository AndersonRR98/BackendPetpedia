<?php

namespace Database\Factories;

use App\Models\Forum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ForumFactory extends Factory
{
    protected $model = Forum::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->optional()->paragraph,
            'creation_date' => $this->faker->dateTimeThisYear,
            'user_id' => User::factory(), // Genera un usuario si es necesario
        ];
    }
}
