<?php

namespace App\Observers;

use App\Models\MovementProduct;

class MovementProductObserver
{
    /**
     * Handle the MovementProduct "created" event.
     */
    public function created(MovementProduct $movementProduct): void
    {
        $mov = $movementProduct->movimiento;
        if ($mov) {
            $mov->calcularYGuardarEstado();
        }
    }

    /**
     * Handle the MovementProduct "updated" event.
     */
    public function updated(MovementProduct $movementProduct): void
    {
        $mov = $movementProduct->movimiento;
        if ($mov) {
            $mov->calcularYGuardarEstado();
        }
    }

    /**
     * Handle the MovementProduct "deleted" event.
     */
    public function deleted(MovementProduct $movementProduct): void
    {
        $mov = $movementProduct->movimiento;
        if ($mov) {
            $mov->calcularYGuardarEstado();
        }
    }

    /**
     * Handle the MovementProduct "restored" event.
     */
    public function restored(MovementProduct $movementProduct): void
    {
        $mov = $movementProduct->movimiento;
        if ($mov) {
            $mov->calcularYGuardarEstado();
        }
    }

    /**
     * Handle the MovementProduct "force deleted" event.
     */
    public function forceDeleted(MovementProduct $movementProduct): void
    {
        $mov = $movementProduct->movimiento;
        if ($mov) {
            $mov->calcularYGuardarEstado();
        }
    }
}
