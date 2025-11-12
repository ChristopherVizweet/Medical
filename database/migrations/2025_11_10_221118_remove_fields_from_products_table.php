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
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('codeInt_product');
            $table->dropColumn('diameterIN_product');
            $table->dropColumn('diameter_nominal');
            $table->dropColumn('diameter_exterior');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('codeInt_product')->nullable();
            $table->string('diameterIN_product')->nullable();
            $table->string('diameter_nominal')->nullable();
            $table->string('diameter_exterior')->nullable();
            
        });
    }
};
