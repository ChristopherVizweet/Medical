<?php

namespace App\Http\Controllers;
use App\Models\Vehiculo;

use Illuminate\Http\Request;

class VerificacionVehiculoController extends Controller
{
    public function index($id)
    {
        $vehiculos = Vehiculo::findOrFail($id);
        return view('vehiculos.index-verificacion', compact('vehiculos'));
    }
    public function create($id)
    {
        $vehiculos = Vehiculo::findOrFail($id);
        return view('vehiculos.create-verificacion', compact('vehiculos'));
    }
    public function store(Request $request, $id)
    {
         $vehiculo = Vehiculo::findOrFail($id);

        $request->validate([
            'fecha_pago_verificacion' => 'required|date',
            'fecha_proxima_verificacion' => 'required|date',
            'monto_verificacion' => 'required|numeric',
            'comprobante_pago_verificacion' => 'nullable|string',
            'observaciones_verificacion' => 'nullable|string',
        ]);
 $comprobante_verificacion = $request->hasFile('comprobante_verificaciones')
            ? $request->file('comprobante_verificaciones')->store('comprobantes', 'public')
            : null;
        $vehiculo = Vehiculo::findOrFail($id);

        $vehiculo->verificaciones()->create([
            'fecha_pago_verificacion' => $request->input('fecha_pago_verificacion'),
            'fecha_proxima_verificacion' => $request->input('fecha_proxima_verificacion'),
            'monto_verificacion' => $request->input('monto_verificacion'),
            'comprobante_pago_verificacion' => $comprobante_verificacion,
            'observaciones_verificacion' => $request->input('observaciones_verificacion'),
        ]);

        return redirect()->route('index-verificacion', ['id' => $id])->with('success', 'Verificación registrada exitosamente.');
    }
}
