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
        Schema::create('proyecto_asistencia_instaladores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_proyecto_asistencia')->nullable();
            $table->string('concepto_proyecto_asistencia')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyecto_asistencia_instaladores');
    }
};
