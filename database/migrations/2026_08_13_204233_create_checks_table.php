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
        Schema::create('checks', function (Blueprint $table) {
            $table->id();
            $table->string('identificador_verificador')->nullable();
            $table->string('nombre_verificador')->nullable();
            $table->date('fecha_verificador')->nullable();
            $table->time('hora_entrada_verificador')->nullable();
            $table->time('hora_salida_comida_verificador')->nullable();
            $table->time('hora_entrada_comida_verificador')->nullable();
            $table->time('hora_salida_verificador')->nullable();
            $table->enum('estado_verificador', ['completo', 'incompleto','falta','permiso'])->
            default('incompleto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checks');
    }
};
