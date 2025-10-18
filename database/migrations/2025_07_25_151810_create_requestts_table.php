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
        Schema::create('requestts', function (Blueprint $table) {
            $table->id();
            // estan por priioridad si la solicitud esbaja media alta urgente
            $table->enum('priority', ['low','medium', 'high','urgent'])->default('medium');
            // estado dos solicitudes para ver si ya se acepto o termino la solicitud 
            $table->enum('application_status', ['accepted','finished']);
            $table->foreignId('trainer_id')->nullable()->constrained('trainers')->onDelete('set null');
            $table->foreignId('adoption_id')->nullable()->constrained('adoptions')->onDelete('set null');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requestts');
    }
};
