<?php

namespace App\Http\Controllers;
use App\Models\Empleados;
use App\Models\InventarioMovimiento;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(){
        $hoy = Carbon::today();
        $proximos = Empleados::whereBetween('fecha_vacaciones', [
            $hoy->copy()->subDays(3),   // 3 días antes
            $hoy->copy()->addDays(3)    // 3 días después
        ])->get();

        $cumpleanos = Carbon::today();
        $cumpleanosProximos = Empleados::whereBetween('fecha_nacimiento', [
            $cumpleanos->copy()->subDays(3),   // 3 días antes
            $cumpleanos->copy()->addDays(3)    // 3 días después
        ])->get();
        // Obtener movimientos de tipo 'salida' cuyo estado en la misma tabla sea 'Pendiente'
        $rPendientes = InventarioMovimiento::where('tipoMovimiento', 'salida')
            ->where('estadoMovimiento', 'Pendiente')
            
            ->get();
            
        // Para debug
        if($rPendientes->isEmpty()) {
            ('No hay registros pendientes');
        } else {
            ('Registros pendientes encontrados: ' . $rPendientes->count());
        }
        
        //Para obtener productos con bajo o nulo inventario
        $bnproducto = Product::Where('stock','<','10')
        ->get();

        return view('dashboard', compact('proximos', 'cumpleanosProximos', 'rPendientes','bnproducto'));
    }
}
