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
             $table->string('id_priority', 100)->change();
            $table->string('id_instalationService', 100)->change();
            $table->string('id_status', 100)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
             $table->integer('id_priority')->change();
            $table->integer('id_instalationService')->change();
            $table->integer('id_status')->change();
        });
    }
};
