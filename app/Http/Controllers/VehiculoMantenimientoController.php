<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\Empleados;
use App\Models\VehiculoMantenimiento;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Pest\Support\View;

class VehiculoMantenimientoController extends Controller
{
    public function index($id){
        $vehiculo = Vehiculo::findOrFail($id);
        $empleados = Empleados::all();
        return view('vehiculos.mantenimiento-vehiculos', compact('vehiculo', 'empleados'));
    }

    public function storeMantenimiento(Request $request, $id){
        $vehiculo = Vehiculo::findOrFail($id);

        $validated = $request->validate([
            'fecha_servicio' => 'nullable|date',
            'concepto' => 'nullable|string',
            'km_vehiculo' => 'nullable|integer',
            'cantidad_vehiculo' => 'nullable|integer',
            'costoUnitario_vehiculo' => 'nullable|numeric',
            'total_vehiculo' => 'nullable|numeric',
            'responsable_mantenimiento_vehiculo' => 'nullable|string',
        ]);

        $vehiculo->mantenimiento()->create([
            'fecha_servicio_vehiculo' => $validated['fecha_servicio'] ?? null,
            'concepto_vehiculo' => $validated['concepto'] ?? null,
            'km_vehiculo' => $validated['km_vehiculo'] ?? null,
            'cantidad_vehiculo' => $validated['cantidad_vehiculo'] ?? null,
            'costoUnitario_vehiculo' => $validated['costoUnitario_vehiculo'] ?? null,
            'total_vehiculo' => $validated['total_vehiculo'] ?? null,
            'responsable_mantenimiento_vehiculo' => $validated['responsable_mantenimiento_vehiculo'] ?? null,
        ]);

        return redirect()->route('index-vehiculos')->with('success', 'Mantenimiento registrado exitosamente');
    }
    //Funcion para convertir a PDF
public function print($id)
{
    
    $mantenimientos = VehiculoMantenimiento::with('responsables','responsables.encargadoVehiculo')->where('vehiculo_id',$id)->get();

    $pdf = Pdf::loadView('vehiculos.pdf-vehiculos', compact('mantenimientos'));

    return $pdf->stream('bitacora_de_mantenimiento'.$id.'.pdf');
}
}
