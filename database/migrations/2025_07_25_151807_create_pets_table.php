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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('age');
            $table->string('species');
            $table->string('breed')->nullable();
            $table->decimal('size', 8, 2)->nullable();
        $table->string('sex');
        $table->text('description');
            $table->string('image')->nullable();
            $table->date('birth_date')->nullable(); 
            $table ->foreignId('shelter_id')->nullable()->contrained('shelters')->ondelete('set null');
           $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
           $table->foreignId('veterinary_id')->nullable()->contrained('veterinaries')->onDelete('set null');
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
