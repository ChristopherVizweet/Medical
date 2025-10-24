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
        Schema::table('empleados', function (Blueprint $table) {
            //Agrego los campos nuevos para empleados
            $table->string('talla_pantalon')->nullable();
            $table->string('talla_camisa')->nullable();
            $table->string('talla_calzado')->nullable();
            $table->string('observaciones_empleado')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->date('fecha_vacaciones')->nullable();
            $table->string('certificados_empleados')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('empleados', function (Blueprint $table) {
            //
            $table->dropColumn(['talla_pantalon', 'talla_camisa', 'talla_calzado', 'observaciones_empleado', 'fecha_nacimiento', 'fecha_vacaciones', 'certificados_empleados']);
        });
    }
};
