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
        Schema::table('vehiculo_check_lists', function (Blueprint $table) {
            $table->time('hora_inspeccion')->nullable();
            $table->decimal('kilometraje_inicial', 10, 2)->nullable();
            $table->decimal('kilometraje_final', 10, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vehiculo_check_lists', function (Blueprint $table) {
            //
        });
    }
};
