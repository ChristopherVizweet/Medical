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
        Schema::create('lotes_asistencia_instaladores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proyecto_asistencia_instaladores_id')->constrained('proyecto_asistencia_instaladores');
            $table->date('fecha_lote_asistencia')->nullable();
            $table->string('tipo_captura')->nullable();
            $table->time('hora_entrada')->nullable();
            $table->time('hora_salida')->nullable();
            $table->string('status_asistencia')->default('pendiente');
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lotes_asistencia_instaladores');
    }
};
