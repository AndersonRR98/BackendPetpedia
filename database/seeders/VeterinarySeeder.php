<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VeterinarySeeder extends Seeder
{
    public function run(): void
    {
        $veterinaries = [
          
            [
                'clinic_name' => 'Animal Clinic Norte',
                'image' => 'pets/default.jpg',
                'specialization' => 'Animales exóticos',
                'veterinary_license' => 'VET-1002',
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
            [
                'clinic_name' => 'Clínica Veterinaria Sur',
                'image' => 'pets/default.jpg',
                'specialization' => 'Medicina general',
                'veterinary_license' => 'VET-1003',
                'schedules' => json_encode([
                    'lunes' => '9:00-17:00',
                    'martes' => '9:00-17:00',
                    'miercoles' => '9:00-17:00',
                    'jueves' => '9:00-17:00',
                    'viernes' => '9:00-16:00',
                    'sabado' => '10:00-14:00',
                    'domingo' => 'Cerrado'
                ]),
                'user_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'clinic_name' => 'PetSalud Express',
                'image' => 'pets/default.jpg',
                'specialization' => 'Urgencias 24h',
                'veterinary_license' => 'VET-1004',
                'schedules' => json_encode([
                    'lunes' => '24h',
                    'martes' => '24h',
                    'miercoles' => '24h',
                    'jueves' => '24h',
                    'viernes' => '24h',
                    'sabado' => '24h',
                    'domingo' => '24h'
                ]),
                'user_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'clinic_name' => 'VetPlus Bucaramanga',
                'image' => 'pets/default.jpg',
                'specialization' => 'Cirugía y hospitalización',
                'veterinary_license' => 'VET-1005',
                'schedules' => json_encode([
                    'lunes' => '8:00-20:00',
                    'martes' => '8:00-20:00',
                    'miercoles' => '8:00-20:00',
                    'jueves' => '8:00-20:00',
                    'viernes' => '8:00-19:00',
                    'sabado' => '9:00-15:00',
                    'domingo' => 'Cerrado'
                ]),
                'user_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ];

        DB::table('veterinaries')->insert($veterinaries);
    }
}
