<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('empleados', function (Blueprint $table) {
            $table->date('fecha_inicio_vacaciones')->nullable()->after('fecha_vacaciones');
            $table->date('fecha_fin_vacaciones')->nullable()->after('fecha_inicio_vacaciones');
        });
    }

    public function down(): void
    {
        Schema::table('empleados', function (Blueprint $table) {
            $table->dropColumn(['fecha_inicio_vacaciones', 'fecha_fin_vacaciones']);
        });
    }
};
