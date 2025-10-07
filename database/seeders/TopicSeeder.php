<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopicSeeder extends Seeder
{
    public function run(): void
    {
        $topics = [
            [
                'title' => '¿Cuántas veces al día debo alimentar a mi perro adulto?',
                'description' => 'Tengo un golden retriever de 3 años y no estoy seguro de la frecuencia ideal de alimentación',
                'creation_date' => now(),
                'forum_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Mi gato no usa el arenero - ¿Consejos?',
                'description' => 'Mi gato de 1 año ha empezado a hacer sus necesidades fuera del arenero. ¿Alguien ha pasado por esto?',
                'creation_date' => now(),
                'forum_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Cómo enseñar a mi perro a no tirar de la correa',
                'description' => 'Necesito ayuda con mi labrador que tira mucho durante los paseos. ¿Qué técnicas recomiendan?',
                'creation_date' => now(),
                'forum_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Vacunas esenciales para gatitos',
                'description' => 'Acabo de adoptar un gatito y quiero saber qué vacunas son absolutamente necesarias',
                'creation_date' => now(),
                'forum_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Experiencias con el refugio Patitas Felices',
                'description' => 'Compartan sus experiencias adoptando en este refugio. ¿Cómo fue el proceso?',
                'creation_date' => now(),
                'forum_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('topics')->insert($topics);
    }
}