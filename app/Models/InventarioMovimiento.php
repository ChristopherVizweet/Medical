<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InventarioMovimiento extends Model
{
     use HasFactory; 

    protected $fillable = [
        'product_id',
        'tipoMovimiento',
        'cantidad_movimiento',
        'codigo_movimiento',
        'material_movimiento',
        'supplier_id',
        'numero_factura_movimiento',
        'costos_movimiento',
        'fecha_movimiento',
        'recibe_id',
        'firma_id',
        'observaciones_movimiento',
        'estadoMovimiento'
    ];

    // Relación con producto
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
    // Relaciones

    public function proveedor()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function recibe()
    {
        return $this->belongsTo(Empleados::class, 'recibe_id');
    }

    public function firma()
    {
        return $this->belongsTo(Empleados::class, 'firma_id');
    }

    public function products()
    {
        return $this->hasMany(MovementProduct::class);
    }
     public const TIPOS = ['entrada', 'salida'];

     public function productos()
    {
        return $this->hasMany(MovementProduct::class, 'inventario_movimientos_id');
    }
   
    public function obra(){
        return $this->belongsTo(MovementProduct::class);
    }

}
