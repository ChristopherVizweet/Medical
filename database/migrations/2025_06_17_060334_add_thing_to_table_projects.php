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
            #$table->string('id_product');
            #$table->string('id_supplier');
            $table->decimal('costo');
            $table->decimal('totalProductos');
            $table->string('recursosObtenidos');
            $table->date('ejecutionDate');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            #$table->dropColumn('id_client');
            #$table->dropColumn('id_supplier');
            #$table->dropColumn('costo');
            $table->dropColumn('totalProductos');
            $table->dropColumn('recursosObtenidos');
            $table->dropColumn('ejecutionDate');
        });
    }
};
