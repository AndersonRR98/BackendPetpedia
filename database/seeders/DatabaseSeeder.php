<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            ProfileSeeder::class,
            VeterinarySeeder::class,
            ShelterSeeder::class,
            TrainerSeeder::class,
            PetSeeder::class,
            ForumSeeder::class,
            TopicSeeder::class,
            AnswerSeeder::class,
            AverageSeeder::class,
            AdoptionSeeder::class,
            AppointmentSeeder::class,
            NotificationSeeder::class,
            RequesttSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            InventorySeeder::class,
            ShoppingCarSeeder::class,
            OrderSeeder::class,
            OrderItemSeeder::class,
            ShipmentSeeder::class,
            ServiceSeeder::class,
            PaymentSeeder::class,
            PaymentmethoSeeder::class,
        ]);
    }
}