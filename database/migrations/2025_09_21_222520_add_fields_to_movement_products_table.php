<?php

use App\Models\Empleados;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('movement_products', function (Blueprint $table) {
             //$table->string('obra_movimiento')->nullable();
             //$table->foreignId('solicitante_movimiento')->constrained('empleados')->nullOnDelete();
             $table->string('folio_movimiento')->nullable();
             $table->integer('cantidadR')->nullable();
             $table->integer('cantidadA')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movement_products', function (Blueprint $table) {
            $table->dropColumn([
                'obra_movimiento',
                'empleado_id',
                'folio_movimiento',
                'cantidadR',
                'cantidadA'
            ]);
        });
    }
};
