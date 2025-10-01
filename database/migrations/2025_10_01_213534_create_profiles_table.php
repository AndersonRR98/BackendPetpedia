<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
             $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // Imagen de perfil
            $table->string('image')->nullable();
            
            // Campos para VETERINARIO (role_id = 1)
            $table->string('clinic_name')->nullable()->comment('Nombre de la clínica veterinaria');
            $table->text('address')->nullable()->comment('Dirección de la clínica o consultorio');
            $table->string('phone')->nullable()->comment('Teléfono de contacto');
            $table->json('schedules')->nullable()->comment('Horarios de atención en formato JSON');
            
            // Campos para ENTRENADOR (role_id = 2)
            $table->string('specialty')->nullable()->comment('Especialidad del entrenador');
            $table->integer('experience_years')->nullable()->comment('Años de experiencia');
            $table->text('qualifications')->nullable()->comment('Certificaciones y cualificaciones');
            
            // Campos para REFUGIO (role_id = 4)
            $table->string('responsible')->nullable()->comment('Persona responsable del refugio');
            
            // Timestamps
            $table->timestamps();
            
            // Índices para mejor performance
            $table->index('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
