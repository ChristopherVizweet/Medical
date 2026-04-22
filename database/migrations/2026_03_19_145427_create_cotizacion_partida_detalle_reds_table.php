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
        Schema::create('cotizacion_partida_detalle_reds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seccion_id')->nullable()->constrained('cotizacion_seccions')->onDelete('cascade');
            $table->foreignId('catalogo_partida_id')->nullable()->constrained('catalogo_partida_rds')->onDelete('cascade');
            $table->string('descripcion_detalle_rm')->nullable();
            $table->string('descripcion1_detalle_rm')->nullable();
            $table->foreignId('concepto_detalle_rm_id')->nullable()->constrained('products')->onDelete('cascade');
            $table->string('unidad_detalle_rm')->nullable();
            $table->integer('cantidad_detalle_rm')->nullable();
            $table->double('precio_detalle_rm')->nullable();
            $table->double('importe_detalle_rm')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotizacion_partida_detalle_reds');
    }
};
