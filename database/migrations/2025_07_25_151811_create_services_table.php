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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the service
            $table->decimal('price', 8, 2); // Price of the service
            $table->text('description');
            $table->timestamp('duration');
            $table->foreignId('trainer_id')->nullable('trainers')->constrained('trainers')->onDelete('set null'); // Foreign key to trainers table
            $table->foreignId('requestt_id')->nullable('requestts')->constrained('requestts')->onDelete('set null'); // Foreign key to requestts table
            $table->foreignId('veterinary_id')->nullable('veterinaries')->constrained('veterinaries')->onDelete('set null'); // Foreign key to veterinaries table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
