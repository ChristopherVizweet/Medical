<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MarcajeChecador extends Model
{
    protected $table = 'marcajes_checador';

    protected $fillable = [
        'empleado_id', 'no', 'mchn', 'enno', 'name', 'mode', 'iomd',
        'date_time', 'origen_hash',
    ];

    protected function casts(): array
    {
        return ['date_time' => 'datetime'];
    }

    public function empleado(): BelongsTo
    {
        return $this->belongsTo(Empleados::class, 'empleado_id');
    }
}
