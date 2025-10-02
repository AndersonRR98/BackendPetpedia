<?php

namespace Database\Seeders;

use App\Models\adoption;
use App\Models\answer;
use App\Models\appointment;
use App\Models\average;
use App\Models\category;
use App\Models\notification;
use App\Models\order;
use App\Models\orderitem;
use App\Models\payment;
use App\Models\paymentmetho;
use App\Models\pet;
use App\Models\product;
use App\Models\requestt;
use App\Models\service;
use App\Models\shelter;
use App\Models\shipment;
use App\Models\shoppingcar;
use App\Models\trainer;
use App\Models\User;
use App\Models\veterinary;
use App\Models\role;


use App\Models\Profile;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         $this->call([
  
    RoleSeeder::class,
   ForumSeeder::class,
     TopicSeeder::class,
     answerSeeder::class,
    UserSeeder::class,
     averageSeeder::class,
     trainerSeeder::class,
     veterinarySeeder::class,
     shelterSeeder::class,
     petSeeder::class,
     adoptionSeeder::class,
     appointmentSeeder::class,
     notificationSeeder::class,
     requesttSeeder::class,
     serviceSeeder::class,
     shoppingcarSeeder::class,
     orderSeeder::class,
     shipmentSeeder::class,
     categorySeeder::class,
     productSeeder::class,
     InventorySeeder::class,
     orderitemSeeder::class,
     paymentSeeder::class,
     paymentmethoSeeder::class,

        ]);
    }
}
