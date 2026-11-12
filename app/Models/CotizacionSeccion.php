<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CotizacionSeccion extends Model
{
    protected $fillable = ['cotizacion_id', 'nameSection','tipo_seccion'];

    //COmienzan las relaciones con las demas tablas
    public function cotizacion(){
        return $this->belongsTo(cotizacion::class);
    }
    public function detalles(){
        return $this->hasMany(CotizacionPartidaDetalleRed::class, 'seccion_id');
    }
    public function productos(){
        return $this->hasMany(Product::class, 'tipo_seccion','tipo_seccion');
    }
}
