<?php

namespace Database\Factories;

use App\Models\Topic;
use App\Models\Answer;
use Illuminate\Database\Eloquent\Factories\Factory;

class AverageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'type' => $this->faker->word,
            'url' => $this->faker->url,
            'upload_date' => $this->faker->dateTime,
            'topic_id' => Topic::inRandomOrder()->first()?->id,
            'answer_id' => Answer::inRandomOrder()->first()?->id,
        ];
    }
}
