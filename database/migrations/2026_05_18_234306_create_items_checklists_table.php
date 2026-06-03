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
        Schema::create('items_checklists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_section')
            ->constrained('section_items_checklists')
            ->onDelete('cascade');
            $table->string('nombre_items_ch');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items_checklists');
    }
};
