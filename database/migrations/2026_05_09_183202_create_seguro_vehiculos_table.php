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
        Schema::create('seguro_vehiculos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_vehiculo')->constrained('vehiculos')->onDelete('cascade');
            $table->string('empresa_seguro')->nullable();
            $table->string('telefono_seguro')->nullable();
            $table->string('correo_seguro')->nullable();
            $table->string('comprobante_pago_seguro')->nullable();
            $table->date('fecha_pago_seguro')->nullable();
            $table->date('fecha_proxima_seguro')->nullable();
            $table->date('fecha_expirar_seguro')->nullable();
            $table->decimal('monto', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguro_vehiculos');
    }
};
