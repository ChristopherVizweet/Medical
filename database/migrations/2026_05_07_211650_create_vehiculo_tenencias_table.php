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
        Schema::create('vehiculo_tenencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_vehiculo')->constrained('vehiculos')->onDelete('cascade');
            $table->decimal('monto_tenencias', 10, 2)->nullable();
            $table->date('fecha_pago_tenencias')->nullable();
            $table->date('fecha_tenencias_proxima')->nullable();
            $table->string('comprobante_tenencias')->nullable();
            $table->text('observaciones_tenencias')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculo_tenencias');
    }
};
