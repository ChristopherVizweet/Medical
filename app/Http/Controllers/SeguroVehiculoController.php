<?php

namespace App\Http\Controllers;

use App\Models\SeguroVehiculo;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class SeguroVehiculoController extends Controller
{
    public function index($id){
        $vehiculos = Vehiculo::findOrFail($id);
        return view('vehiculos.index-seguroV', compact('vehiculos'));
    }
    public function create($id){
        $vehiculos = Vehiculo::findOrFail($id);
        return view('vehiculos.create-seguroV',compact('vehiculos'));
    }
    public function store(Request $request, $id){
        $vehiculo = Vehiculo::findOrFail($id);

        $validate = $request->validate([
            'empresa_seguro' => 'nullable|string|max:255',
            'telefono_seguro' => 'nullable|string|max:20',
            'correo_seguro' => 'nullable|email|max:255',
            'monto' => 'nullable|numeric',
            'fecha_pago_seguro' => 'nullable|date',
            'fecha_proxima_seguro' => 'nullable|date',
            'fecha_expirar_seguro' => 'nullable|date',
            'comprobante_pago_seguro' => 'nullable|file',
        ]);
        $comprobante_seguro = $request->hasFile('comprobante_pago_seguro')
            ? $request->file('comprobante_pago_seguro')->store('comprobantes', 'public')
            : null;
        SeguroVehiculo::create([
            'id_vehiculo' => $id,
            'empresa_seguro' => $validate['empresa_seguro'] ?? null,
            'telefono_seguro' => $validate['telefono_seguro'] ?? null,
            'correo_seguro' => $validate['correo_seguro'] ?? null,
            'monto' => $validate['monto'] ?? null,
            'fecha_pago_seguro' => $validate['fecha_pago_seguro'] ?? null,
            'fecha_proxima_seguro' => $validate['fecha_proxima_seguro'] ?? null,
            'fecha_expirar_seguro' => $validate['fecha_expirar_seguro'] ?? null,
            'comprobante_pago_seguro' => $comprobante_seguro ?? null,
        ]);
        return redirect()->route('index-vehiculos')->with('success', 'Seguro registrado exitosamente.');
    }
}
