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
            $table->string('name');
            $table->string('specialty');
            $table->integer('experience'); // Assuming experience is in years
            $table->text('qualifications'); // Assuming qualifications is a text field
            $table->string('phone');
            $table->string('email')->unique();
            $table->text('biography'); // Assuming biography is a text field
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
