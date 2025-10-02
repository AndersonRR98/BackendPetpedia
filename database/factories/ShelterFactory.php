<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Shelter;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShelterFactory extends Factory
{
    protected $model = Shelter::class;

    public function definition(): array
    {
        $shelterNames = [
            'Refugio de Esperanza Animal',
            'Santuario Mascotas Felices',
            'Hogar Temporal para Animales',
            'Centro de Rescate Animal',
            'Refugio Patitas Contentas',
            'Albergue Amigo Fiel'
        ];

        return [
            'name' => $this->faker->randomElement($shelterNames),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->companyEmail(),
            'address' => $this->faker->address(),
            'responsible' => $this->faker->name(),
        ];
    }
}