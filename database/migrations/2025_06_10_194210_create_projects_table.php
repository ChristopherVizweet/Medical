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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('folioProject',20)->unique();
            $table->string('id_client',50);
            $table->string('nameProject',255);
            $table->string('seller_id_usuario',50);
            $table->string('company',20);
            $table->string('inCharge_id_usuario',20);
            $table->date('dateBegin');
            $table->date('dateEnd');
            $table->decimal('budget');
            $table->string('accountBank',100);
            $table->integer('id_priority');
            $table->integer('id_instalationService');
            $table->integer('id_status');
            $table->date('requestDate');
            $table->date('estimateDate');
            $table->date('authorizedDate');
            $table->date('finishDate');
            $table->integer('id_empleado');
            $table->integer('jornadas');
            $table->decimal('salario');
            $table->decimal('totalSalario');
             $table->decimal('totalManoObra');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
