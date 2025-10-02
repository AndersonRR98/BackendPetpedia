<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Trainer;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrainerFactory extends Factory
{
    protected $model = Trainer::class;

    public function definition(): array
    {
        $specialties = [
            'Adiestramiento Canino', 'Modificación de Conducta', 'Obediencia Básica',
            'Agility', 'Terapia Asistida', 'Entrenamiento para Mascotas Reactivas'
        ];

        $qualifications = [
            'Certificado en Adiestramiento Canino Avanzado',
            'Licenciatura en Etología Animal',
            'Certificación Internacional en Modificación de Conducta',
            'Diplomado en Terapia Asistida con Animales',
            'Certificación Profesional en Entrenamiento Canino'
        ];

        return [
            'name' => $this->faker->name(),
            'specialty' => $this->faker->randomElement($specialties),
            'experience' => $this->faker->numberBetween(1, 20),
            'qualifications' => $this->faker->randomElement($qualifications),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'biography' => $this->faker->paragraph() . ' Especialista en ' . $this->faker->randomElement($specialties) . '.',
            'rating' => $this->faker->randomFloat(1, 3, 5),
            'image' => $this->faker->optional(0.4)->imageUrl(300, 300, 'trainer', true),
        ];
    }
}