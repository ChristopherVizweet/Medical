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
        Schema::table('projects', function (Blueprint $table) {
            $table->foreignId('empleados_id')->constrained()->onDelete('cascade');
            $table->integer('jornadas');
            $table->decimal('salario');
            $table->decimal('totalSalario');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('empleados_id');
            $table->dropColumn('jornadas');
            $table->dropColumn('salario');
            $table->dropColumn('totalSalario');
        });
    }
};
