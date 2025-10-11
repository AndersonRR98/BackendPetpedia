<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('forums', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('content'); // El contenido del post
            $table->string('image')->nullable(); // Imagen del post
            $table->integer('likes_count')->default(0);
            $table->integer('comments_count')->default(0);
            $table->json('comments')->nullable(); // Guardamos comentarios como JSON
            $table->timestamp('creation_date');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('forums');
    }
};