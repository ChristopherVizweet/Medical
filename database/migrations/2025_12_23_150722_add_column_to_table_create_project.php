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
            $table->string('estado_project')->nullable();
            $table->string('lugar_project')->nullable();
            $table->string('area_project')->nullable();
            $table->string('piso_project')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['estado_project', 'lugar_project', 'area_project', 'piso_project']);
        });
    }
};
