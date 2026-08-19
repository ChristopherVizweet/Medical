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
        // Agregar campos a la tabla empleados
        Schema::table('empleados', function (Blueprint $table) {
            if (!Schema::hasColumn('empleados', 'derecho_vacaciones')) {
                $table->integer('derecho_vacaciones')->nullable()->default(16)->after('fecha_vacaciones')->comment('Número de días de derecho a vacaciones anuales');
            }
        });

        // Crear tabla para registrar los períodos de vacaciones
        Schema::create('empleado_vacaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empleado_id');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('dias_tomados');
            $table->string('estado')->default('aprobado')->comment('aprobado, pendiente, rechazado');
            $table->text('observaciones')->nullable();
            $table->timestamps();

            $table->foreign('empleado_id')
                ->references('id')
                ->on('empleados')
                ->onDelete('cascade');

            $table->index('empleado_id');
            $table->index('fecha_inicio');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('empleados', function (Blueprint $table) {
            if (Schema::hasColumn('empleados', 'derecho_vacaciones')) {
                $table->dropColumn('derecho_vacaciones');
            }
        });

        Schema::dropIfExists('empleado_vacaciones');
    }
};
