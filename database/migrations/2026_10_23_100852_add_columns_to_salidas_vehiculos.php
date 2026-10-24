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
        Schema::table('vehiculo_salidas', function (Blueprint $table) {
            $table->decimal('kilometro_por_litro', 10, 2)->nullable();
            $table->decimal('costo_por_kilometro', 10, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vehiculo_salidas', function (Blueprint $table) {
            $table->dropColumn(['kilometro_por_litro', 'costo_por_kilometro']);
        });
    }
};

