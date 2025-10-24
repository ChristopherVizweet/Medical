<?php

namespace App\Http\Controllers;
use App\Models\Empleados;
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

        return view('dashboard', compact('proximos', 'cumpleanosProximos'));
    }
}
