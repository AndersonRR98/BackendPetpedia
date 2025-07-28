<?php

namespace Database\Factories;

use App\Models\Notification;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationFactory extends Factory
{
    protected $model = Notification::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'user_id' => User::inRandomOrder()->first()?->id,
            'appointment_id' => Appointment::inRandomOrder()->first()?->id,
        ];
    }
}
