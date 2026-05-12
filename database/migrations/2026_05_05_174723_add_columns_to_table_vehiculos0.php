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
        Schema::table('vehiculos', function (Blueprint $table) {
            $table->string('nombre_vechiculo')->nullable();
            $table->string('numeroSerie_vehiculo')->nullable();
            $table->string('marca_vehiculo')->nullable();
            $table->string('modeloAño_vehiculo')->nullable();
            $table->string('placas_vehiculo')->nullable();
            $table->string('area_vehiculo')->nullable();
            $table->foreignId('id_encargado_vehiculo')->nullable()->constrained('users')->nullOnDelete();
            $table->string('observaciones_vehiculo')->nullable();
            $table->string('estado_vehiculo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vehiculos', function (Blueprint $table) {
            $table->dropColumn([
                'nombre_vechiculo',
                'numeroSerie_vehiculo',
                'marca_vehiculo',
                'modeloAño_vehiculo',
                'placas_vehiculo',
                'area_vehiculo',
                'id_encargado_vehiculo',
                'observaciones_vehiculo',
                'estado_vehiculo'
            ]);
        });
    }
};
