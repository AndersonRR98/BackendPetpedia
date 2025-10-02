<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    protected $model = Profile::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'photo' => $this->faker->optional(0.3)->imageUrl(200, 200, 'animals', true),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'biography' => $this->faker->paragraph(),
            'rating' => $this->faker->randomFloat(2, 3, 5),
            'review_count' => $this->faker->numberBetween(0, 100),
        ];
    }

    /**
     * Estado para VETERINARIOS - Datos específicos de veterinaries
     */
    public function veterinarian()
    {
        return $this->state(function (array $attributes) {
            $specializations = [
                'Cirugía General', 'Medicina Interna', 'Dermatología', 
                'Cardiología', 'Oftalmología', 'Odontología', 'Neurología', 'Oncología'
            ];

            return [
                'clinic_name' => $this->faker->company() . ' Veterinary Clinic',
                'veterinary_license' => 'VET-' . $this->faker->randomNumber(5, true),
                'specialization' => $this->faker->randomElement($specializations),
                'schedules' => json_encode([
                    'lunes' => ['08:00-12:00', '14:00-18:00'],
                    'martes' => ['08:00-12:00', '14:00-18:00'],
                    'miercoles' => ['08:00-12:00'],
                    'jueves' => ['08:00-12:00', '14:00-18:00'],
                    'viernes' => ['08:00-12:00', '14:00-18:00'],
                    'sabado' => ['09:00-13:00'],
                    'domingo' => ['Cerrado']
                ]),
                'biography' => $this->faker->paragraph() . ' Veterinario especializado en ' . $this->faker->randomElement($specializations) . '.',
            ];
        });
    }

    /**
     * Estado para ENTRENADORES - Datos específicos de trainers
     */
    public function trainer()
    {
        return $this->state(function (array $attributes) {
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
                'specialty' => $this->faker->randomElement($specialties),
                'experience_years' => $this->faker->numberBetween(1, 20),
                'qualifications' => $this->faker->randomElement($qualifications),
                'hourly_rate' => $this->faker->randomFloat(2, 20, 80),
                'biography' => $this->faker->paragraph() . ' Entrenador especializado en ' . $this->faker->randomElement($specialties) . ' con ' . $this->faker->numberBetween(1, 20) . ' años de experiencia.',
            ];
        });
    }

    /**
     * Estado para REFUGIOS - Datos específicos de shelters
     */
    public function shelter()
    {
        return $this->state(function (array $attributes) {
            $shelterNames = [
                'Refugio de Esperanza Animal',
                'Santuario Mascotas Felices',
                'Hogar Temporal para Animales',
                'Centro de Rescate Animal',
                'Refugio Patitas Contentas',
                'Albergue Amigo Fiel'
            ];

            return [
                'shelter_name' => $this->faker->randomElement($shelterNames),
                'responsible' => $this->faker->name(),
                'capacity' => $this->faker->numberBetween(10, 200),
                'biography' => 'Refugio dedicado al rescate, cuidado y adopción de animales en situación de vulnerabilidad. ' . $this->faker->paragraph(),
            ];
        });
    }

    /**
     * Estado para CLIENTES
     */
    public function client()
    {
        return $this->state(function (array $attributes) {
            return [
                'biography' => $this->faker->name() . ' es un amante de los animales y dueño responsable de mascotas. ' . $this->faker->sentence(),
            ];
        });
    }

    
 
}