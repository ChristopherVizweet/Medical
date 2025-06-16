<?php

namespace App\Http\Controllers;
use App\Models\Priority;
use Illuminate\Http\Request;

class PriorityController extends Controller
{
    public function index(){
     $priorities=Priority::all();
        return view('Priority.index-priority', compact('priorities'));
    }
    public function create(Request $request){
        return view('Priority.create-priority');
    }
    public function store(Request $request) {
        // Validar y guardar datos
        $request->validate([
            'namePriority' => 'required|string|max:15',
        ]);
    
        Priority::create([
            'namePriority' => $request->namePriority,
        ]);
        return redirect()->route('index-priority')->with('success', 'Prioridad creada exitosamente');
}
    public function edit($id){
        $priorities = Priority::findOrFail($id); // Busca el proveedor por ID
    return view('Priority.edit-priority', compact('priorities')); // Carga la vista correcta
    }
    public function update(Request $request, $id)
{
    $request->validate([
     'namePriority' => 'required|string|max:15',
    ]);

    $priorities = Priority::findOrFail($id);
    $priorities->update([
       'namePriority' => $request->namePriority,
    ]);

    return redirect()->route('index-priority')->with('success', 'Prioridad actualizada correctamente');
}
public function delete($id){
    $priorities=Priority::FindOrFail($id);
    $priorities->delete();
    
    return redirect()->route('index-priority')->with('success','Prioridad eliminada correctamente');
    }
}



