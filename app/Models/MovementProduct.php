<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovementProduct extends Model
{
    protected $fillable = ['inventario_movimientos_id', 'codigo' ,'product_id', 'cantidad', 'costo_unitario',
'obra_movimiento','empleado_id','folio_movimiento','cantidadR','cantidadA','cantidadE',
'encargado_almacen','encargado_envio','encargado_recibe'];

    public function movimiento()
    {
        return $this->belongsTo(InventarioMovimiento::class, 'inventario_movimientos_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function empleado()
    {
        return $this->belongsTo(Empleados::class, 'empleado_id');
    }
    public function encargadoA()
    {
        return $this->belongsTo(Empleados::class , 'encargado_almacen');
    }
    public function encargadoE()
    {
        return $this->belongsTo(Empleados::class , 'encargado_envio');
    }
    public function encargadoR()
    {
        return $this->belongsTo(Empleados::class , 'encargado_recibe');
    }
}
