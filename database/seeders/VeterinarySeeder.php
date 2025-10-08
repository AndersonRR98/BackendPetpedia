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
                'clinic_name' => 'VetCare Centro',
                'image' => 'pets/default.jpg',
                'specialization' => 'Pequeños animales',
                'veterinary_license' => 'VET-1001',
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
            // ---------- 4 NUEVOS ----------
            [
                'clinic_name' => 'Happy Pets Centro',
                'image' => 'pets/default.jpg',
                'specialization' => 'Dermatología veterinaria',
                'veterinary_license' => 'VET-1006',
                'schedules' => json_encode([
                    'lunes' => '9:00-18:00',
                    'martes' => '9:00-18:00',
                    'miercoles' => '9:00-18:00',
                    'jueves' => '9:00-18:00',
                    'viernes' => '9:00-18:00',
                    'sabado' => '10:00-14:00',
                    'domingo' => 'Cerrado'
                ]),
                'user_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'clinic_name' => 'Animal Health Pro',
                'image' => 'pets/default.jpg',
                'specialization' => 'Rehabilitación y fisioterapia',
                'veterinary_license' => 'VET-1007',
                'schedules' => json_encode([
                    'lunes' => '8:00-16:00',
                    'martes' => '8:00-16:00',
                    'miercoles' => '8:00-16:00',
                    'jueves' => '8:00-16:00',
                    'viernes' => '8:00-16:00',
                    'sabado' => 'Cerrado',
                    'domingo' => 'Cerrado'
                ]),
                'user_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'clinic_name' => 'Clinivet Oriente',
                'image' => 'pets/default.jpg',
                'specialization' => 'Animales de granja',
                'veterinary_license' => 'VET-1008',
                'schedules' => json_encode([
                    'lunes' => '6:00-15:00',
                    'martes' => '6:00-15:00',
                    'miercoles' => '6:00-15:00',
                    'jueves' => '6:00-15:00',
                    'viernes' => '6:00-15:00',
                    'sabado' => '7:00-12:00',
                    'domingo' => 'Cerrado'
                ]),
                'user_id' => 11,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'clinic_name' => 'Mundo Animal',
                'image' => 'pets/default.jpg',
                'specialization' => 'Medicina preventiva',
                'veterinary_license' => 'VET-1009',
                'schedules' => json_encode([
                    'lunes' => '10:00-19:00',
                    'martes' => '10:00-19:00',
                    'miercoles' => '10:00-19:00',
                    'jueves' => '10:00-19:00',
                    'viernes' => '10:00-19:00',
                    'sabado' => '9:00-13:00',
                    'domingo' => 'Cerrado'
                ]),
                'user_id' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('veterinaries')->insert($veterinaries);
    }
}
