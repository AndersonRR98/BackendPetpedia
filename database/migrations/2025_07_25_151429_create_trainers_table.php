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
        Schema::create('trainers', function (Blueprint $table) {
            $table->id();
            $table->string('specialty');
            $table->integer('experience_years'); // años de experiencia
            $table->text('qualifications')->nullable();
            $table->decimal('hourly_rate', 8, 2)->default(0);
            $table->decimal('rating', 3, 2)->default(0); // de 0 a 5
            $table->integer('review_count')->default(0);
            $table->string('image')->nullable();

            $table->foreignId('user_id')->constrained('users')->ondelete('set null');

            
            // Assuming biography is a text field
            $table->timestamps();
        });
    }
 
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainers');
    }
};
