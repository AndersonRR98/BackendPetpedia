<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pet;
use App\Models\shelter;
use App\Models\User;
use App\Models\veterinary;

class PetSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(25)->create();
        shelter::factory(10)->create();
        veterinary::factory(10)->create();

        Pet::factory(100)->create();
    }
}
