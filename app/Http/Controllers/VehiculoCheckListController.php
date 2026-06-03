<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use App\Models\User;
use App\Models\Vehiculo;
use App\Models\VehiculoCheckList;
use App\Models\RespuestaChecklist;
use App\Models\SectionItemsChecklist;
use App\Models\VehiculoFoto;
use App\Models\ItemsChecklist;
use App\Models\PhotosVehiculos;
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
        $checklist = $vehiculos->checklist()->create([
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
        
        return redirect()->route('create-checklist-items', ['id' => $checklist->id]);
    }
    public function createItems($id){
        $seccions = SectionItemsChecklist::with('items')->get(); // Obtener todas las secciones y sus items
        $vehiculos= VehiculoCheckList::findOrFail($id); // Cargar datos del checklist por su id
        return view('vehiculos.create-checklist-items', compact('id', 'vehiculos','seccions'));
    }

    public function storeItems(Request $request, $id){
        $checklist = VehiculoCheckList::findOrFail($id);

        if($request->has('items') && is_array($request->items)){
            foreach($request->items as $item){
                if(isset($item['id_item'], $item['estado_item'])){
                    RespuestaChecklist::create([
                        'id_checklist' => $id,
                        'id_item' => $item['id_item'],
                        'estado_item' => $item['estado_item'],
                    ]);
                }
            }
        }

        return redirect()->route('create-photos-vehiculos', $checklist->id)->with('success', 'Items guardados');
    }

     public function createPhotos($id){
       $fotosV= VehiculoCheckList::findOrFail($id); // Cargar datos del checklist por su id
        $vehiculos= VehiculoCheckList::findOrFail($id); // Cargar datos del checklist por su id
        return view('vehiculos.create-photos-vehiculos', compact('id', 'vehiculos','fotosV'));
    }

    public function storePhotos(Request $request, $id)
    {
        $request->validate([
            'foto_frente' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
            'foto_lado_izquierdo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
            'foto_lado_derecho' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
            'foto_trasera' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
            'foto_adicional' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
        ]);
        $foto_vehiculo_frente = $request->hasFile('foto_frente')
            ? $request->file('foto_frente')->store('photos', 'public')
            : null;
        $foto_vehiculo_lado_izquierdo = $request->hasFile('foto_lado_izquierdo')
            ? $request->file('foto_lado_izquierdo')->store('photos', 'public')
            : null;
        $foto_vehiculo_lado_derecho = $request->hasFile('foto_lado_derecho')
            ? $request->file('foto_lado_derecho')->store('photos', 'public')
            : null;
        $foto_vehiculo_trasera = $request->hasFile('foto_trasera')
            ? $request->file('foto_trasera')->store('photos', 'public')
            : null;
        $foto_vehiculo_adicional = $request->hasFile('foto_adicional')
            ? $request->file('foto_adicional')->store('photos', 'public')
            : null;

    PhotosVehiculos::create([
        'id_checklist' => $id,
        'foto_frente' => $foto_vehiculo_frente,
        'foto_lado_izquierdo' => $foto_vehiculo_lado_izquierdo,
        'foto_lado_derecho' => $foto_vehiculo_lado_derecho,
        'foto_trasera' => $foto_vehiculo_trasera,
        'foto_adicional' => $foto_vehiculo_adicional,
    ]);

    return redirect()->route('index-checklist', $checklist->id_vehiculo)->with('success', 'Checklist registrado exitosamente');
    }

    //Funcion para convertir a PDF
    public function print($id)
    {
        $checks = VehiculoCheckList::findOrFail($id); // Cargar datos del checklist por su id
        $vehiculos = $checks->vehiculo; // Cargar datos del vehículo asociado
        $conductores = $checks->conductor; // Cargar datos del conductor asociado al checklist
        $encargados = $checks->responsableEntrega; // Cargar datos del encargado de entrega asociado al checklist
        $items = $checks->respuestas()->with('item')->get(); // Cargar las respuestas del checklist con los datos de los items relacionados
        $seccions = SectionItemsChecklist::with('items')->get(); // Cargar todas las secciones y sus items para mostrar en el PDF
        $pdf = Pdf::loadView('vehiculos.show-checklist', compact('vehiculos', 'checks', 'conductores', 'encargados', 'items', 'seccions'));

        return $pdf->stream('Vale_salida_'.$id.'.pdf');
    }
    
}
