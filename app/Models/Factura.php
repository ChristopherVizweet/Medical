<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    /** @use HasFactory<\Database\Factories\FacturaFactory> */
    use HasFactory;
    protected $fillable = [
        'rfc_emisor','nombre_emisor','rfc_receptor',
        'nombre_receptor','folio_factura',
        'folio_fiscal','fecha_emision','fecha_vencimiento',
        'fecha_pago','recibe_factura','destino_factura',
        'comprobante_pdf','comprobante_xml','status_factura',
        'total_factura','observaciones_factura','supplier_id',
        'company_id','empleado_id','project_id','user_id',
        'responsable_almacen_id','responsable_chofer_id',
        'obra_factura_id'
    ];

    //Comienzan las relaciones de factura para las entradas
    public function proyectos()
    {
        return $this->belongsTo(Project::class);

    }
    public function entradas()
    {
        return $this->hasMany(InventarioMovimiento::class, 'factura_id');
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class); //una factura tiene un proveedor
    }
   
    public function empresa(){
        return $this->belongsTo(Company::class); //Una factura tiene una empresa (receptor)
    }
    public function usuario(){
        return $this->belongsTo(User::class); //Una factura tiene un usuario (almacén)
    }
    public function proyecto(){
        return $this->belongsTo(Project::class);
    }
}