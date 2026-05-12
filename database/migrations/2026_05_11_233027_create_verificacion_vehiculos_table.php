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
        Schema::create('verificacion_vehiculos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehiculo_id')->constrained('vehiculos')->onDelete('cascade');
            $table->date('fecha_pago_verificacion');
            $table->date('fecha_proxima_verificacion');
            $table->string('comprobante_pago_verificacion')->nullable();
            $table->decimal('monto_verificacion', 10, 2);
            $table->text('observaciones_verificacion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verificacion_vehiculos');
    }
};
