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
        Schema::table('clients', function (Blueprint $table) {
                $table->string('telefono_supervisor')->nullable();
                $table->string('telefono_encargado')->nullable();
                $table->string('email_supervisor')->nullable();
                $table->string('email_encargado')->nullable();        
                
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clients', function (Blueprint $table) {
                $table->dropColumn('telefono_supervisor');
                $table->dropColumn('telefono_encargado');
                $table->dropColumn('email_supervisor');
                $table->dropColumn('email_encargado');
        });
    }
};
