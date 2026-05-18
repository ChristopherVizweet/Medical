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
        Schema::create('vehiculo_check_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_vehiculo')->constrained('vehiculos')->onDelete('cascade');
            $table->string('destino_check')->nullable();
            $table->string('id_placa_vehiculo')->nullable()->constrained('vehiculos', 'placas_vehiculo')->onDelete('cascade') ;
            $table->string('id_conductor_checklist')->nullable()->constrained('empleados')->onDelete('cascade');
            $table->text('motivo_checklist')->nullable();
            $table->dateTime('fecha_salida_checklist')->nullable();
            $table->dateTime('fecha_entrega_checklist')->nullable();
            $table->string('responsable_entrega_checklist')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculo_check_lists');
    }
};
