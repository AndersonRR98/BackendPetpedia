<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['name' => 'cliente', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'veterinaria', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'entrenador', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'refugio', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('roles')->insert($roles);
    }
}