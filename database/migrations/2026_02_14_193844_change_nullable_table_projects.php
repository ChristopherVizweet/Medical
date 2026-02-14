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
            $table->string('nameProject')->nullable()->change();
            $table->string('seller_id_usuario')->nullable()->change();
            $table->string('company')->nullable()->change();
            $table->string('inCharge_id_usuario')->nullable()->change();
            $table->date('dateBegin')->nullable()->change();
            $table->date('dateEnd')->nullable()->change();
            $table->decimal('budget')->nullable()->change();
            $table->string('accountBank')->nullable()->change();
            $table->string('id_priority')->nullable()->change();
            $table->string('id_status')->nullable()->change();
            $table->date('requestDate')->nullable()->change();
            $table->date('estimateDate')->nullable()->change();
            $table->date('authorizedDate')->nullable()->change();
            $table->date('finishDate')->nullable()->change();
            $table->decimal('totalManoObra')->nullable()->change();
            $table->decimal('totalProductos')->nullable()->change();
            $table->string('recursosObtenidos')->nullable()->change();
            
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            //
        });
    }
};
