<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use function PHPUnit\Framework\isNull;

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

// dentro de la clase InventarioMovimiento
public function calcularYGuardarEstado(): string
{
    // Asegurarnos de tener los productos cargados
    $this->loadMissing('productos');

    // Si no hay productos, dejamos pendiente por defecto
    if ($this->productos->isEmpty()) {
        $this->estadoMovimiento = $this->estadoMovimiento ?? 'Pendiente';
        $this->save();
        return $this->estadoMovimiento;
    }

    // Si cualquier producto no tiene cantidad enviada => 'En proceso'
    foreach ($this->productos as $p) {
    
       // if (is_null($p->cantidadE) || $p->cantidadE === '') {
         //   $this->estadoMovimiento = 'Completado';
           // $this->save();
            //return $this->estadoMovimiento;
        //}
        if($p->cantidadR>0 && $p->cantidadA==0){
            $this->estadoMovimiento = 'Solicitud';
            $this->save();
            return $this->estadoMovimiento;
        }
        if($p->cantidadR>0 && $p->cantidadA>0 && $p->cantidad==0){
            $this->estadoMovimiento = 'Aprobado';
            $this->save();
            return $this->estadoMovimiento;
        }
         if($p->cantidadA == $p->cantidad){
            $this->estadoMovimiento = 'Completado';
            $this->save();
            return $this->estadoMovimiento;
        }
    }
    
    // Si todas las filas tienen cantidadE == cantidadA => 'Completado'
    $todosCompletados = $this->productos->every(function($p) {
        return (int)$p->cantidadE === (int)$p->cantidadA;
    });

    if ($todosCompletados) {
        $this->estadoMovimiento = 'Completado';
        $this->save();
        return $this->estadoMovimiento;
    }

    // Si el movimiento ya fue marcado manualmente como 'Revisado', mantenerlo
    if ($this->estadoMovimiento === 'Revisado') {
        return $this->estadoMovimiento;
    }
    if ($this->estadoMovimiento === 'Solicitado') {
        return $this->estadoMovimiento;
    }
    // Por defecto, si hay cantidades enviadas pero no coinciden con aprobadas -> 'Pendiente'
    $this->estadoMovimiento = 'Pendiente';
    $this->save();
    return $this->estadoMovimiento;
}
}
