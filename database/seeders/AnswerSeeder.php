<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswerSeeder extends Seeder
{
    public function run(): void
    {
        $answers = [
            [
                'content' => 'Para un perro adulto como tu golden, lo ideal es alimentarlo 2 veces al día - por la mañana y por la tarde. Esto ayuda a mantener su energía estable y previene problemas digestivos.',
                'creation_date' => now(),
                'topic_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'content' => 'Concuerdo con la respuesta anterior. Dos comidas diarias es lo recomendado. Además, asegúrate de medir las porciones según el peso y nivel de actividad de tu perro.',
                'creation_date' => now(),
                'topic_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'content' => 'El problema del arenero puede tener varias causas: 1) El arenero está sucio, 2) No le gusta la arena, 3) Estrés, 4) Problemas médicos. Te recomiendo primero llevarlo al veterinario para descartar problemas de salud.',
                'creation_date' => now(),
                'topic_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'content' => 'Para el paseo sin tirar, te recomiendo el método de "parar y cambiar de dirección" cada vez que tire. También usa un arnés anti-tirones y premia cuando camine tranquilo a tu lado.',
                'creation_date' => now(),
                'topic_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('answers')->insert($answers);
    }
}