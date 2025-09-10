<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovementProduct extends Model
{
    protected $fillable = ['inventario_movimientos_id', 'codigo' ,'product_id', 'cantidad', 'costo_unitario'];

    public function movimiento()
    {
        return $this->belongsTo(InventarioMovimiento::class, 'inventario_movimientos_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
