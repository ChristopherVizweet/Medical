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
        Schema::create('movement_products', function (Blueprint $table) {
            $table->id();
    $table->foreignId('inventario_movimientos_id')->constrained('inventario_movimientos')->onDelete('cascade');
    $table->string('codigo'); // aquí va el código del producto (Al que le dan los proveedores)
    $table->foreignId('product_id')->constrained('products');
    $table->integer('cantidad');
    $table->decimal('costo_unitario', 10, 2)->nullable();
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movement_products');
    }
};
