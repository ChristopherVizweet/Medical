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
        Schema::table('movement_products', function (Blueprint $table) {
            $table->string('codigo')->nullable()->change();
            $table->string('cantidad')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movement_products', function (Blueprint $table) {
            $table->string('codigo')->nullable(false)->change();
            $table->string('cantidad')->nullable(false)->change();
        });
    }
};
