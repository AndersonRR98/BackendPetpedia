<?php

use App\Models\paymentmetho;
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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
             $table->decimal('amount', 10, 2);
            $table->date('date');
            $table->enum('status', ['pending', 'completed', 'failed']); // Estado del pago  
    // Usuario que realiza el pago
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // Relación polimórfica
            $table->morphs('payment'); // Esto crea los campos 'payable_id' y 'payable_type'
    // Campos polimórficos
    //este es el campo del id de la polimorfica 
            //$table->unsignedBigInteger('payable_id');
            // este es el capo polimorfico donde se escoje un tipo de pago 
             //$table->string('payment_type');
    

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
