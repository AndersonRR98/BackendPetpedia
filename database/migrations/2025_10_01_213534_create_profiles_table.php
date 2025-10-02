<?php
// database/migrations/xxxx_create_profiles_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->onDelete('cascade');
            
            // Información básica para todos
            $table->string('photo')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->text('biography')->nullable();
            
            // Campos específicos para VETERINARIOS
            $table->string('clinic_name')->nullable();
            $table->string('veterinary_license')->nullable();
            $table->string('specialization')->nullable();
            $table->json('schedules')->nullable();
            
            // Campos específicos para ENTRENADORES
            $table->string('specialty')->nullable();
            $table->integer('experience_years')->default(0);
            $table->text('qualifications')->nullable();
            $table->decimal('hourly_rate', 8, 2)->nullable();
            
            // Campos específicos para REFUGIOS
            $table->string('shelter_name')->nullable();
            $table->string('responsible_person')->nullable();
            $table->integer('capacity')->nullable();
            
            // Campos para CLIENTES
            $table->string('pet_preferences')->nullable();
            $table->string('emergency_contact')->nullable();
            
            // Rating común
            $table->decimal('rating', 3, 2)->default(0.00);
            $table->integer('review_count')->default(0);
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};