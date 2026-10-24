\<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehiculo_salidas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehiculo_id')->constrained('vehiculos')->cascadeOnDelete();
            $table->foreignId('conductor_id')->nullable()->constrained('empleados')->nullOnDelete();
            $table->date('fecha');
            $table->string('obra', 150);
            $table->decimal('odometro_inicial', 10, 2);
            $table->decimal('dinero_entregado', 10, 2)->default(0);
            $table->decimal('litros_cargados', 10, 2)->default(0);
            $table->timestamps();

            $table->index(['vehiculo_id', 'fecha']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehiculo_salidas');
    }
};
