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
             $table->dropColumn('responsable_almacen_id_factura');
             $table->dropColumn('responsable_chofer_id_factura');
             $table->dropColumn('responsable_obra_factura');
             $table->dropColumn('obra_factura');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('facturas', function (Blueprint $table) {
            //
        });
    }
};
