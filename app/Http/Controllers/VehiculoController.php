<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use ResourceBundle;

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
}
