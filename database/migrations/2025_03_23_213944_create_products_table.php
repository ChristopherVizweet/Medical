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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_categories')->constrained('categories')->onDelete('cascade');
            $table->string('name_product');
            $table->foreignId('id_supplier')->constrained('suppliers')->onDelete('cascade');
            $table->string('codeExt_product')->nullable();
            $table->string('codeInt_product')->nullable();
            $table->decimal('diameterMM_product',8,2)->nullable();
            $table->decimal('diameterIN_product',8,2)->nullable();
            $table->string('manufact_product')->nullable();
            $table->decimal('valueArt_product',10,2)->nullable();
            $table->string('image_product')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
