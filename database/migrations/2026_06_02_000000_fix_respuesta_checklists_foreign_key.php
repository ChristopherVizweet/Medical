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
        Schema::table('respuesta_checklists', function (Blueprint $table) {
            $table->dropForeign(['id_item']);
            $table->foreign('id_item')
                ->references('id')
                ->on('items_checklists')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('respuesta_checklists', function (Blueprint $table) {
            $table->dropForeign(['id_item']);
            $table->foreign('id_item')
                ->references('id')
                ->on('section_items_checklists')
                ->onDelete('cascade');
        });
    }
};
