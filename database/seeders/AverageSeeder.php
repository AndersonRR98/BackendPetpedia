<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AverageSeeder extends Seeder
{
    public function run(): void
    {
        $averages = [
            // Imágenes para topics
            [
                'type' => 'image',
                'url' => 'averages/topic1-vacuna.jpg',
                'upload_date' => now(),
                'topic_id' => 4,
                'answer_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'image',
                'url' => 'averages/topic2-arenero.jpg',
                'upload_date' => now(),
                'topic_id' => 2,
                'answer_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Videos para respuestas
            [
                'type' => 'video',
                'url' => 'averages/answer1-paseo.mp4',
                'upload_date' => now(),
                'topic_id' => null,
                'answer_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'document',
                'url' => 'averages/answer2-alimentacion.pdf',
                'upload_date' => now(),
                'topic_id' => null,
                'answer_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('averages')->insert($averages);
    }
}