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
        Schema::create('vehiculo_mantenimientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehiculo_id')->constrained('vehiculos')->onDelete('cascade');
            $table->date('fecha_servicio_vehiculo')->nullable();
            $table->string('concepto_vehiculo')->nullable();
            $table->integer('km_vehiculo')->nullable();
            $table->integer('cantidad_vehiculo')->nullable();
            $table->decimal('costoUnitario_vehiculo', 10, 2)->nullable();
            $table->decimal('total_vehiculo', 10, 2)->nullable();
            $table->string('responsable_mantenimiento_vehiculo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculo_mantenimientos');
    }
};
