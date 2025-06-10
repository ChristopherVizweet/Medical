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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('curp',20)->unique();
            $table->string('Nombre',10);
            $table->string('apellidos',22);
            $table->string('organizacion',20);
            $table->string('cargo',30);
            $table->string('correoElectronico',50);
            $table->string('numeroTelefonoTrabajo',20);
            $table->string('numeroTelParti',20);
            $table->double('sueldo');
            $table->string('calle',50);
            $table->string('ciudad',10);
            $table->string('estadoProv',20);
            $table->integer('codigoPostal');
            $table->string('pais',15);
            $table->string('foto',255);
            $table->string('tipoSangre',20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
