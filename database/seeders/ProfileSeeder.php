<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        // Crear perfiles para usuarios existentes según su rol
        $users = User::all();

        foreach ($users as $user) {
            // Verificar si el usuario ya tiene perfil
            if (!$user->profile) {
                $this->createProfileForUser($user);
            }
        }
    }

    private function createProfileForUser(User $user): void
    {
        switch ($user->role_id) {
            case 1: // Veterinario
                Profile::factory()->veterinarian()->create(['user_id' => $user->id]);
                break;
                
            case 2: // Entrenador
                Profile::factory()->trainer()->create(['user_id' => $user->id]);
                break;
                
            case 3: // Cliente
                Profile::factory()->client()->create(['user_id' => $user->id]);
                break;
                
            case 4: // Refugio
                Profile::factory()->shelter()->create(['user_id' => $user->id]);
                break;
                
                
            default: // Por defecto (cliente)
                Profile::factory()->client()->create(['user_id' => $user->id]);
                break;
        }
    }
}