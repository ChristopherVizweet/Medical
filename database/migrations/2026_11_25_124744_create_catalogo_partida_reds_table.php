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
        Schema::create('catalogo_partida_reds', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_rm')->nullable()->onDelete('cascade');
            $table->string('tipo_rm')->nullable()->onDelete('cascade');
            $table->string('descripcion_rm')->nullable()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalogo_partida_reds');
    }
};
