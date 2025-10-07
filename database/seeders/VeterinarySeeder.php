<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VeterinarySeeder extends Seeder
{
    public function run(): void
    {
        $veterinaries = [
            [
                'name' => 'VetCare Centro',
                'image' => 'pets/default.jpg',
                'email' => 'info@vetcare.com',
                'phone' => '+57 1 2345678',
                'address' => 'Calle 123 #45-67, Bogotá',
                'schedules' => json_encode([
                    'lunes' => '8:00-18:00',
                    'martes' => '8:00-18:00',
                    'miercoles' => '8:00-18:00',
                    'jueves' => '8:00-18:00',
                    'viernes' => '8:00-17:00',
                    'sabado' => '9:00-13:00',
                    'domingo' => 'Cerrado'
                ]),
                'user_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Animal Clinic Norte',
                'image' => 'pets/default.jpg',
                'email' => 'contacto@animalclinic.com',
                'phone' => '+57 1 8765432',
                'address' => 'Avenida 456 #78-90, Bogotá',
                'schedules' => json_encode([
                    'lunes' => '7:00-19:00',
                    'martes' => '7:00-19:00',
                    'miercoles' => '7:00-19:00',
                    'jueves' => '7:00-19:00',
                    'viernes' => '7:00-18:00',
                    'sabado' => '8:00-14:00',
                    'domingo' => 'Urgencias 24h'
                ]),
                'user_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('veterinaries')->insert($veterinaries);
    }
}