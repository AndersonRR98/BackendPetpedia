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
        Schema::create('veterinaries', function (Blueprint $table) {
            $table->id();
            $table->string('clinic_name');
            $table->string('image')->nullable(); // Guarda la ruta de la imagen
            $table->string('specialization');
            $table->string('veterinary_license');
            $table->json('schedules')->nullable();
            $table->foreignId('user_id')->constrained('users')->ondelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veterinaries');
    }
};
