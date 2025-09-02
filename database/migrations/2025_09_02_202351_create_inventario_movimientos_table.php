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
        Schema::create('inventario_movimientos', function (Blueprint $table) {
            $table->id();
             // Relación con producto
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            // Tipo de movimiento: entrada o salida
            $table->enum('tipoMovimiento', ['entrada', 'salida']);
            $table->integer('cantidad_movimiento')->nullable();
            $table->string('codigo_movimiento')->nullable();
            $table->string('material_movimiento')->nullable();
            $table->foreignId('supplier_id')->nullable()->constrained('suppliers')->nullOnDelete();
            $table->string('numero_factura_movimiento')->nullable();
            $table->decimal('costos_movimiento',10,2)->nullable();
            $table->date('fecha_movimiento')->nullable();
            //empleado que recibe
            $table->foreignId('recibe_id')->nullable()->constrained('empleados')->nullOnDelete();
            // Empleado que firma
            $table->foreignId('firma_id')->nullable()->constrained('empleados')->nullOnDelete();
            $table->text('observaciones_movimiento')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventario_movimientos');
    }
};
