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
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->string('rfc_emisor')->nullable()->constrained('suppliers')->onDelete('set null'); //LLAVE FORANEA A LA TABLA DE PROVEEDORES
            $table->string('nombre_emisor')->nullable()->constrained('suppliers')->onDelete('set null'); //LLAVE FORANEA A LA TABLA DE PROVEEDORES
            $table->string('rfc_receptor')->nullable()->constrained('companies')->onDelete('set null'); //LLAVE FORANEA A LA TABLA DE EMPRESAS
            $table->string('nombre_receptor')->nullable()->constrained('companies')->onDelete('set null'); //LLAVE FORANEA A LA TABLA DE EMPRESAS
            $table->string('folio_factura')->nullable();
            $table->string('folio_fiscal')->nullable();
            $table->date('fecha_emision')->nullable();
            $table->date('fecha_vencimiento')->nullable();
            $table->date('fecha_pago')->nullable();
            $table->string('recibe_factura')->nullable();
            $table->string('destino_factura')->nullable();
            $table->foreignId('responsable_almacen_id_factura')->nullable()->constrained('empleados')->onDelete('set null');
            $table->foreignId('responsable_chofer_id_factura')->nullable()->constrained('empleados')->onDelete('set null');
            $table->foreignId('responsable_obra_factura')->nullable()->constrained('empleados')->onDelete('set null');
            $table->foreignId('obra_factura')->nullable()->constrained('projects')->onDelete('set null');
            $table->string('comprobante_pdf')->nullable();
            $table->string('comprobante_xml')->nullable();
            $table->string('status_factura')->nullable();
            $table->decimal('total_factura')->nullable();
            $table->string('observaciones_factura')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');

    }
};