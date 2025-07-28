<?php

namespace Database\Factories;

use App\Models\Topic;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'content' => $this->faker->paragraph,
            'creation_date' => $this->faker->dateTime,
            'topic_id' => Topic::inRandomOrder()->first()?->id,
        ];
    }
}
