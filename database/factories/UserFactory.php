<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        // Obtener roles existentes o usar valor por defecto
        $roleIds = Role::pluck('id')->toArray();
        $roleId = empty($roleIds) ? 3 : $this->faker->randomElement($roleIds);
        
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role_id' => $roleId,
            'is_active' => true,
            'remember_token' => \Str::random(10),
        ];
    }

   

    public function veterinarian()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => $this->faker->firstName() . ' ' . $this->faker->lastName() . ' (Veterinario)',
                'role_id' => 1,
            ];
        });
    }

    public function trainer()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => $this->faker->firstName() . ' ' . $this->faker->lastName() . ' (Entrenador)',
                'role_id' => 2,
            ];
        });
    }

    public function client()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => $this->faker->firstName() . ' ' . $this->faker->lastName() . ' (Cliente)',
                'role_id' => 3,
            ];
        });
    }

    public function shelter()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => $this->faker->company() . ' (Refugio)',
                'role_id' => 4,
            ];
        });
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}