<?php

namespace App\Http\Controllers;
use App\Models\Vehiculo;
use App\Models\VehiculoTenencias;
use Illuminate\Http\Request;

class VehiculoTenenciasController extends Controller
{
    public function index($id){
         $vehiculos = Vehiculo::findOrFail($id);
        return view('vehiculos.index-tenencias', compact('vehiculos'));
    }
    public function create($id){
        $vehiculos = Vehiculo::findOrFail($id);
        return view('vehiculos.create-tenencias',compact('vehiculos'));
    }
    public function store(Request $request, $id){
        $vehiculo = Vehiculo::findOrFail($id);

        $validate = $request->validate([
            
            'monto_tenencias' => 'nullable|numeric',
            'fecha_pago_tenencias' => 'nullable|date',
            'fecha_tenencias_proxima' => 'nullable|date',
            'comprobante_tenencias' => 'nullable|file',
            'observaciones_tenencias' => 'nullable|string',
        ]);

        $comprobante_tenencia = $request->hasFile('comprobante_tenencias')
            ? $request->file('comprobante_tenencias')->store('comprobantes', 'public')
            : null;

        VehiculoTenencias::create([
            'id_vehiculo' => $id,
            'monto_tenencias' => $validate['monto_tenencias'] ?? null,
            'fecha_pago_tenencias' => $validate['fecha_pago_tenencias'] ?? null,
            'fecha_tenencias_proxima' => $validate['fecha_tenencias_proxima'] ?? null,
            'comprobante_tenencias' => $comprobante_tenencia ?? null,
            'observaciones_tenencias' => $validate['observaciones_tenencias'] ?? null,
        ]);

        return redirect()->route('index-tenencias', ['id' => $id])->with('success', 'Tenencia registrada exitosamente');
    }
}
