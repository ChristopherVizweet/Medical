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
        Schema::create('photos_vehiculos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_checklist')->constrained('vehiculo_check_lists')->onDelete('cascade');
            $table->string('foto_frente')->nullable();
            $table->string('foto_lado_izquierdo')->nullable();
            $table->string('foto_lado_derecho')->nullable();
            $table->string('foto_trasera')->nullable();
            $table->string('foto_adicional')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photos_vehiculos');
    }
};
