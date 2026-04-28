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
            $table->string('Nombre')->nullable()->change();
            $table->string('organizacion')->nullable()->change();
            $table->string('cargo')->nullable()->change();
            $table->string('correoElectronico')->nullable()->change();
            $table->string('numeroTelefonoTrabajo')->nullable()->change();
            $table->string('numeroTelParti')->nullable()->change();
            $table->string('sueldo')->nullable()->change();
            $table->string('calle')->nullable()->change();
            $table->string('ciudad')->nullable()->change();
            $table->string('estadoProv')->nullable()->change();
            $table->string('codigoPostal')->nullable()->change();
            $table->string('pais')->nullable()->change();
            $table->string('foto')->nullable()->change();
            $table->string('tipoSangre')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('empleados', function (Blueprint $table) {
                $table->string('Nombre')->nullable(false)->change();
                $table->string('organizacion')->nullable(false)->change();
                $table->string('cargo')->nullable(false)->change();
                $table->string('correoElectronico')->nullable(false)->change();
                $table->string('numeroTelefonoTrabajo')->nullable(false)->change();
                $table->string('numeroTelParti')->nullable(false)->change();
                $table->string('sueldo')->nullable(false)->change();
                $table->string('calle')->nullable(false)->change();
                $table->string('ciudad')->nullable(false)->change();
                $table->string('estadoProv')->nullable(false)->change();
                $table->string('codigoPostal')->nullable(false)->change();
                $table->string('pais')->nullable(false)->change();
                $table->string('foto')->nullable(false)->change();
                $table->string('tipoSangre')->nullable(false)->change();
        });
    }
};
