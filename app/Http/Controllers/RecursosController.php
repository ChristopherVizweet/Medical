<?php

namespace App\Http\Controllers;
use App\Models\Recursos;
Use App\Models\Status;
use Illuminate\Http\Request;

class RecursosController extends Controller
{
    public function index(){
     $recursos=Recursos::all();
        return view('recursos.index-recursos', compact('recursos'));
    }
    public function create(Request $request){
        return view('recursos.create-recursos');
    }
    public function store(Request $request) {
        // Validar y guardar datos
        $request->validate([
            'recursosObtenidos' => 'required|string|max:20',
        ]);
    
        Recursos::create([
            'recursosObtenidos' => $request->recursosObtenidos,
        ]);
        return redirect()->route('index-recursos')->with('success', 'Recursos creados exitosamente');
}
    public function edit($id){
        $recursos = Recursos::findOrFail($id); // Busca el proveedor por ID
    return view('recursos.edit-recursos', compact('recursos')); // Carga la vista correcta
    }
    public function update(Request $request, $id)
{
    $request->validate([
     'recursosObtenidos' => 'required|string|max:20',
    ]);

    $recursosObtenidos = Recursos::findOrFail($id);
    $recursosObtenidos->update([
       'recursosObtenidos' => $request->recursosObtenidos,
    ]);

    return redirect()->route('index-recursos')->with('success', 'Recursos actualizados correctamente');
}
public function delete($id){
    $recursosObtenidos=Recursos::FindOrFail($id);
    $recursosObtenidos->delete();
    
    return redirect()->route('index-recursos')->with('success','Recursos eliminados correctamente');
    }
}



