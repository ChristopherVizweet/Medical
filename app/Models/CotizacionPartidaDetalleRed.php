<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CotizacionPartidaDetalleRed extends Model
{
    protected $fillable = [
        'seccion_id', //FK de seccion
        'catalogo_partida_id', //FK de catalogo
        'descripcion_detalle_rm',
        'descripcion1_detalle_rm',
        'concepto_detalle_rm_id', //FK de products
        'unidad_detalle_rm',
        'cantidad_detalle_rm',
        'precio_detalle_rm',
        'importe_detalle_rm'
    ];

    //Comienzan las relaciones con las demas tablas
    
    public function seccion(){
        return $this->belongsTo(CotizacionSeccion::class, 'seccion_id');
    }
    public function catalogo(){
        return $this->belongsTo(CatalogoPartidaRd::class, 'catalogo_partida_id');
    }
    public function producto(){
        return $this->hasMany(Product::class, 'concepto_detalle_rm_id');
    }
}
