<?php

// database/factories/RoleFactory.php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    protected static $roles = [
        'Assistant Administrator',
        'Administrator',
        'Client',
        'Veterinarian',
        'Trainer',
    ];

    public function definition(): array
    {
        return [
            'name' => collect(self::$roles)->random(), // elige uno de los roles fijos al azar
        ];
    }
}
