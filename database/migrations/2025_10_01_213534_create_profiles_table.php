<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            // Campos para VETERINARIOS
            $table->string('clinic_name')->nullable()->after('biography');
            $table->string('veterinary_license')->nullable()->after('clinic_name');
            $table->string('specialization')->nullable()->after('veterinary_license');
            $table->json('schedules')->nullable()->after('specialization');
            
            // Campos para ENTRENADORES
            $table->string('specialty')->nullable()->after('schedules');
            $table->integer('experience_years')->default(0)->after('specialty');
            $table->text('qualifications')->nullable()->after('experience_years');
            $table->decimal('hourly_rate', 8, 2)->nullable()->after('qualifications');
            
            // Campos para REFUGIOS
            $table->string('shelter_name')->nullable()->after('hourly_rate');
            $table->string('responsible')->nullable()->after('shelter_name');
            $table->integer('capacity')->nullable()->after('responsible');
        });
    }

    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn([
                'clinic_name',
                'veterinary_license', 
                'specialization',
                'schedules',
                'specialty',
                'experience_years',
                'qualifications',
                'hourly_rate',
                'shelter_name',
                'responsible',
                'capacity'
            ]);
        });
    }
};