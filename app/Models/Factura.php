<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    /** @use HasFactory<\Database\Factories\FacturaFactory> */
    use HasFactory;
    protected $fillable = [
        'rfc_emisor','nombre_emisor','rfc_receptor','nombre_receptor','folio_factura',
        'folio_fiscal','fecha_emision','fecha_vencimiento','fecha_pago',
        'recibe_factura','destino_factura','responsable_almacen_id_factura',
        'responsable_chofer_id_factura','responsable_obra_factura',
        'obra_factura','comprobante_pdf','comprobante_xml','status_factura',
        'total_factura','observaciones_factura'
    ];
}
