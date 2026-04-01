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
        Schema::table('facturas', function (Blueprint $table) {
            $table->string('responsable_almacen_id');
            $table->string('responsable_chofer_id');
            $table->string('obra_factura_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('facturas', function (Blueprint $table) {
            $table->dropColumn('responsable_almacen_id');
            $table->dropColumn('responsable_chofer_id');
            $table->dropColumn('obra_factura_id');
        });
    }
};
