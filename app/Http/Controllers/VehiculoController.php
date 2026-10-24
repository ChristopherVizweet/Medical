<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use App\Models\Vehiculo;
use App\Models\VehiculoSalida;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    public function index(){
        $vehiculos = Vehiculo::all();
        $mantenimientos = Vehiculo::with('mantenimiento')->get();
        return view('vehiculos.index-vehiculos',compact('vehiculos', 'mantenimientos'));
    }
     public function create(){
        $vehiculos = Vehiculo::all();
        $empleados = Empleados::all();
        return view('vehiculos.create-vehiculos', compact('vehiculos', 'empleados'));
    }
    public function store(Request $request){
        //valida datos
      // dd($request->all());
       $request->validate([
        'nombre_vehiculo' => 'nullable|string|max:30',
        'numeroSerie_vehiculo' => 'nullable|string|max:20',
        'marca_vehiculo' => 'nullable|string|max:20',
        'modeloAño_vehiculo ' => 'nullable|string',
        'placas_vehiculo' => 'nullable|string',
        'area_vehiculo' => 'nullable|string',
        'id_encargado_vehiculo' => 'nullable|integer|exists:empleados,id',
        'observaciones_vehiculo' => 'nullable|string',
        'estado_vehiculo' => 'nullable|string',
        'photo_vehiculo' => 'nullable|image|mimes:jpg,png,jpeg|max:5000',
       ]);
       $foto_vehiculo = $request->hasFile('photo_vehiculo')
            ? $request->file('photo_vehiculo')->store('photos', 'public')
            : null;

    Vehiculo::create([
        'nombre_vehiculo' => $request->nombre_vehiculo,
        'numeroSerie_vehiculo' => $request->numeroSerie_vehiculo,
        'marca_vehiculo' => $request->marca_vehiculo,
        'modeloAño_vehiculo' => $request->modeloAño_vehiculo,
        'placas_vehiculo' => $request->placas_vehiculo,
        'area_vehiculo' => $request->area_vehiculo,
        'id_encargado_vehiculo' => $request->id_encargado_vehiculo,
        'observaciones_vehiculo' => $request->observaciones_vehiculo,
        'estado_vehiculo' => $request->estado_vehiculo,
        'photo_vehiculo' => $foto_vehiculo,
        //dd($request->all()),
    ]);
    return redirect()->route('index-vehiculos')->with('success', 'Vehículo registrado exitosamente');
    }
    
public function edit($id){
    $vehiculo = Vehiculo::findOrFail($id);
    $empleados = Empleados::all();
    return view('vehiculos.edit-vehiculo', compact('vehiculo','empleados'));

}
public function update(Request $request, $id){
    
    $request->validate([
        'nombre_vehiculo' => 'nullable|string|max:30',
        'numeroSerie_vehiculo' => 'nullable|string|max:20',
        'marca_vehiculo' => 'nullable|string|max:20',
        'modeloAño_vehiculo ' => 'nullable|string',
        'placas_vehiculo' => 'nullable|string',
        'area_vehiculo' => 'nullable|string',
        'observaciones_vehiculo' => 'nullable|string',
        'estado_vehiculo' => 'nullable|string',
        'id_encargado_vehiculo' => 'nullable|integer|exists:empleados,id',
        'photo_vehiculo' => 'nullable|image|mimes:jpg,png,jpeg|max:5000',
       ]);
       $foto2_vehiculo = $request->hasFile('photo_vehiculo')
            ? $request->file('photo_vehiculo')->store('photos', 'public')
            : $request->input('photo_actual_vehiculo'); // Mantiene la foto actual si no se sube una nueva
    

    $vehiculo = Vehiculo::findOrFail($id);
    $vehiculo->update([
        'nombre_vehiculo' => $request->nombre_vehiculo,
        'numeroSerie_vehiculo' => $request->numeroSerie_vehiculo,
        'marca_vehiculo' => $request->marca_vehiculo,
        'modeloAño_vehiculo' => $request->modeloAño_vehiculo,
        'placas_vehiculo' => $request->placas_vehiculo,
        'area_vehiculo' => $request->area_vehiculo,
        'observaciones_vehiculo' => $request->observaciones_vehiculo,
        'estado_vehiculo' => $request->estado_vehiculo,
        'id_encargado_vehiculo' => $request->id_encargado_vehiculo,
        'photo_vehiculo' => $foto2_vehiculo,
        //dd($request->all()),
    ]);

    return redirect()->route('index-vehiculos')->with('success', 'Vehículo actualizado exitosamente');
}

public function salidas(Request $request, $id)
{
    $request->validate([
        'fecha' => 'sometimes|date',
    ]);

    $vehiculo = Vehiculo::findOrFail($id);
    $fecha = $request->query('fecha', now()->toDateString());
    $salidas = $vehiculo->salidas()
        ->with('conductor')
        ->whereDate('fecha', $fecha)
        ->orderByDesc('created_at')
        ->get();

    $resumen = [
        'kilometros' => $salidas->sum('kilometros_recorridos'),
        'dinero' => $salidas->sum('dinero_entregado'),
        'litros' => $salidas->sum('litros_cargados'),
        'pendientes' => $salidas->whereNull('odometro_final')->count(),
    ];

    $empleados = Empleados::orderBy('Nombre')->orderBy('apellidos')->get();

    return view('vehiculos.salidas-vehiculo', compact('vehiculo', 'fecha', 'salidas', 'resumen', 'empleados'));
}

public function storeSalida(Request $request, $id)
{
    $request->validate([
        'fecha' => 'required|date',
        'conductor_id' => 'nullable|integer|exists:empleados,id',
        'obra' => 'required|string|max:150',
        'odometro_inicial' => 'required|numeric|min:0|max:99999999.99',
        'dinero_entregado' => 'required|numeric|min:0|max:99999999.99',
        'litros_cargados' => 'required|numeric|min:0|max:99999999.99',
    ]);

    $vehiculo = Vehiculo::findOrFail($id);
    $salida = $vehiculo->salidas()->create($request->only([
        'fecha',
        'conductor_id',
        'obra',
        'odometro_inicial',
        'dinero_entregado',
        'litros_cargados',
    ]));

    return redirect()->route('salidas-vehiculo', [
        'id' => $vehiculo->id,
        'fecha' => $salida->fecha->toDateString(),
    ])->with('success', 'Salida del vehículo registrada correctamente.');
}

public function finalizarSalida(Request $request, $id, $salidaId)
{
    $salida = VehiculoSalida::where('vehiculo_id', $id)->findOrFail($salidaId);

    if ($salida->odometro_final !== null) {
        return redirect()->route('salidas-vehiculo', [
            'id' => $id,
            'fecha' => $salida->fecha->toDateString(),
        ])->withErrors(['odometro_final' => 'Esta salida ya fue cerrada.']);
    }

    $request->validate([
        'odometro_final' => 'required|numeric|min:' . $salida->odometro_inicial . '|max:99999999.99',
    ]);

    $salida->update(['odometro_final' => $request->odometro_final]);

    return redirect()->route('salidas-vehiculo', [
        'id' => $id,
        'fecha' => $salida->fecha->toDateString(),
    ])->with('success', 'Regreso registrado y salida cerrada correctamente.');
}
}
