<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use App\Models\User;
use App\Models\Vehiculo;
use App\Models\VehiculoCheckList;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class VehiculoCheckListController extends Controller
{
    public function index($id){
        $vehiculos = Vehiculo::FindOrFail($id);
        $checklists = $vehiculos->checklist()->get(); // Obtener los checklists relacionados con el vehículo
        return view('vehiculos.index-checklist', compact('vehiculos', 'checklists'));
    }
    public function create($id){
        $vehiculos = Vehiculo::FindOrFail($id);
        $conductores = Empleados::all();// Obtener solo los empleados que son conductores en checklist
        $responsables = User::role('admin')->get(); // Obtener todos los usuarios para el campo de responsable de entrega
        return view('vehiculos.create-checklist', compact('vehiculos', 'conductores', 'responsables'));
    }
    public function store(Request $request, $id){
        $vehiculos = Vehiculo::FindOrFail($id);
        $vehiculos->checklist()->create([
            'id_vehiculo' => $id,
            'destino_check' => $request->destino_check,
            'id_placa_vehiculo' => $request->id_placa_vehiculo,
            'id_conductor_checklist' => $request->id_conductor_checklist,
            'motivo_checklist' => $request->motivo_checklist,
            'fecha_salida_checklist' => $request->fecha_salida_checklist,
            'fecha_entrega_checklist' => $request->fecha_entrega_checklist,
            'responsable_entrega_checklist' => $request->responsable_entrega_checklist,
            'hora_inspeccion' => $request->hora_inspeccion,
            'kilometraje_inicial' => $request->kilometraje_inicial,
            'kilometraje_final' => $request->kilometraje_final,
        ]);
        return redirect()->route('index-checklist', $vehiculos->id)->with('success', 'Checklist registrado exitosamente.');
    }

    //Funcion para convertir a PDF
    public function print($id)
    {
        $checks = VehiculoCheckList::findOrFail($id); // Cargar datos del checklist por su id
        $vehiculos = $checks->vehiculo; // Cargar datos del vehículo asociado
        $conductores = $checks->conductor; // Cargar datos del conductor asociado al checklist
        $encargados = $checks->responsableEntrega; // Cargar datos del encargado de entrega asociado al checklist
        $pdf = Pdf::loadView('vehiculos.show-checklist', compact('vehiculos', 'checks', 'conductores', 'encargados'));

        return $pdf->stream('Vale_salida_'.$id.'.pdf');
    }
}
