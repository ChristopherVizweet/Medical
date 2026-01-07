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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')
            ->constrained()
            ->cascadeOnDelete();

            $table->foreignId('empleados_id')
            ->nullable()
            ->constrained()
            ->nullOnDelete();

            $table->enum('tipo', ['deducible', 'no_deducible']);
            $table->string('concepto')->nullable();
            $table->string('folio')->nullable();
            $table->string('metodo_pago')->nullable();
            $table->date('fecha_recepcion');

            $table->decimal('subtotal', 10, 2);
            $table->decimal('iva', 10, 2)->default(0);
            $table->decimal('total', 10, 2);

            $table->string('comprobante_path')->nullable();

            $table->boolean('es_planeado')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
