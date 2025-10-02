<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Veterinary;
use Illuminate\Database\Eloquent\Factories\Factory;

class VeterinaryFactory extends Factory
{
    protected $model = Veterinary::class;

    public function definition(): array
    {
        $specializations = [
            'Cirugía General', 'Medicina Interna', 'Dermatología', 
            'Cardiología', 'Oftalmología', 'Odontología', 'Neurología', 'Oncología'
        ];

        return [
            'name' => $this->faker->company() . ' Veterinary Clinic',
            'image' => $this->faker->optional(0.5)->imageUrl(400, 300, 'clinic', true),
            'email' => $this->faker->companyEmail(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'schedules' => json_encode([
                'lunes' => ['08:00-12:00', '14:00-18:00'],
                'martes' => ['08:00-12:00', '14:00-18:00'],
                'miercoles' => ['08:00-12:00'],
                'jueves' => ['08:00-12:00', '14:00-18:00'],
                'viernes' => ['08:00-12:00', '14:00-18:00'],
                'sabado' => ['09:00-13:00'],
                'domingo' => ['Cerrado']
            ]),
            'user_id' => User::factory(),
        ];
    }
}