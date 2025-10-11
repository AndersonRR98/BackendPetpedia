<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ForumSeeder extends Seeder
{
    public function run(): void
    {
        $forums = [
            // Post de María González (Cliente - ID 1)
            [
                'title' => 'Juegos para perros activos',
                'description' => 'Comparte tus juegos favoritos para mantener a tu perro entretenido',
                'content' => 'Hoy llevé a mi perro Max al parque y descubrí un nuevo juego que le encanta: buscar la pelota entre los árboles. ¡Se divirtió muchísimo! ¿Alguien más tiene juegos recomendados para perros activos?',
                'image' => 'pets/default.jpg',
                'likes_count' => 24,
                'comments_count' => 3,
                'comments' => json_encode([
                    [
                        'id' => 1,
                        'user_id' => 2,
                        'user_name' => 'Carlos Rodríguez',
                        'content' => 'A mi perro le encanta jugar al escondite con sus juguetes. ¡Es muy divertido verlo buscarlos por toda la casa!',
                        'created_at' => now()->subHours(1)->toDateTimeString()
                    ],
                    [
                        'id' => 2,
                        'user_id' => 3,
                        'user_name' => 'Ana Martínez',
                        'content' => 'Prueba con puzzles de comida, a mi golden retriever le mantiene entretenido por horas y estimula su inteligencia.',
                        'created_at' => now()->subMinutes(45)->toDateTimeString()
                    ],
                    [
                        'id' => 3,
                        'user_id' => 2,
                        'user_name' => 'Carlos Rodríguez',
                        'content' => 'También recomiendo juegos de olfato, son excelentes para estimular mentalmente a los perros.',
                        'created_at' => now()->subMinutes(20)->toDateTimeString()
                    ]
                ]),
                'creation_date' => now()->subHours(2),
                'user_id' => 1, // María González
                'created_at' => now()->subHours(2),
                'updated_at' => now()->subHours(2),
            ],
            
            
          
            // Post de Carlos Rodríguez (Cliente - ID 2)
            [
                'title' => 'Problemas con ladridos excesivos',
                'description' => 'Ayuda con comportamiento canino',
                'content' => 'Mi perro ladra mucho cuando llegan visitas a casa. ¿Algún consejo para controlar este comportamiento? Ya intenté distraerlo con juguetes pero no funciona siempre. Se pone muy ansioso con las visitas nuevas.',
                'image' => 'pets/default.jpg',
                'likes_count' => 12,
                'comments_count' => 1,
                'comments' => json_encode([
                    [
                        'id' => 1,
                        'user_id' => 3,
                        'user_name' => 'Ana Martínez',
                        'content' => 'Intenta darle un juguete con comida antes de que lleguen las visitas. Así se distrae con algo positivo.',
                        'created_at' => now()->subHours(6)->toDateTimeString()
                    ]
                ]),
                'creation_date' => now()->subHours(8),
                'user_id' => 2, // Carlos Rodríguez
                'created_at' => now()->subHours(8),
                'updated_at' => now()->subHours(8),
            ],
            // Post de Ana Martínez (Cliente - ID 3)
            [
                'title' => 'Chequeo veterinario anual',
                'description' => 'Importancia de los controles regulares',
                'content' => 'Llevé a mi conejito al veterinario hoy para su chequeo anual. ¡Todo perfecto! Recordatorio importante: no olviden las vacunas anuales de sus mascotas. La prevención es clave para una vida larga y saludable.',
                'image' => 'pets/default.jpg',
                'likes_count' => 21,
                'comments_count' => 1,
                'comments' => json_encode([
                    [
                        'id' => 1,
                        'user_id' => 1,
                        'user_name' => 'María González',
                        'content' => 'Muy importante el recordatorio. Yo llevo a mis gatos cada 6 meses para control preventivo.',
                        'created_at' => now()->subHours(2)->toDateTimeString()
                    ]
                ]),
                'creation_date' => now()->subHours(3),
                'user_id' => 3, // Ana Martínez
                'created_at' => now()->subHours(3),
                'updated_at' => now()->subHours(3),
            ],
            // Post de María González (Cliente - ID 1)
            [
                'title' => '¡Adopté a Luna!',
                'description' => 'Historias de adopción feliz',
                'content' => 'Hace un mes adopté a Luna de un refugio local. Es una mezcla de labrador y no podría estar más feliz con mi decisión. ¡Adopten, no compren! 🐾 Ella tenía 2 años y estaba en el refugio desde cachorra.',
                'image' => 'pets/default.jpg',
                'likes_count' => 45,
                'comments_count' => 3,
                'comments' => json_encode([
                    [
                        'id' => 1,
                        'user_id' => 2,
                        'user_name' => 'Carlos Rodríguez',
                        'content' => '¡Qué hermosa historia! Luna tiene mucha suerte de tenerte. Las adopciones cambian vidas.',
                        'created_at' => now()->subDays(2)->toDateTimeString()
                    ],
                    [
                        'id' => 2,
                        'user_id' => 3,
                        'user_name' => 'Ana Martínez',
                        'content' => 'Felicidades por adoptar. Los perros de refugio son los más agradecidos.',
                        'created_at' => now()->subDays(1)->toDateTimeString()
                    ],
                    [
                        'id' => 3,
                        'user_id' => 2,
                        'user_name' => 'Carlos Rodríguez',
                        'content' => 'Hermoso mensaje. Ojalá más personas consideraran la adopción.',
                        'created_at' => now()->subHours(12)->toDateTimeString()
                    ]
                ]),
                'creation_date' => now()->subDays(3),
                'user_id' => 1, // María González
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3),
            ],
          
            
        ];

        DB::table('forums')->insert($forums);
    }
}