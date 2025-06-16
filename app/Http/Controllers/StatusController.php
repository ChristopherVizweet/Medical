<?php

namespace App\Http\Controllers;

use App\Models\User;
Use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index(){
     $statuses=Status::all();
        return view('Status.index-status', compact('statuses'));
    }
    public function create(Request $request){
        return view('Status.create-status');
    }
    public function store(Request $request) {
        // Validar y guardar datos
        $request->validate([
            'nameStatus' => 'required|string|max:20',
        ]);
    
        Status::create([
            'nameStatus' => $request->nameStatus,
        ]);
        return redirect()->route('index-status')->with('success', 'Status creado exitosamente');
}
    public function edit($id){
        $statuses = Status::findOrFail($id); // Busca el proveedor por ID
    return view('status.edit-status', compact('statuses')); // Carga la vista correcta
    }
    public function update(Request $request, $id)
{
    $request->validate([
     'nameStatus' => 'required|string|max:20',
    ]);

    $statuses = Status::findOrFail($id);
    $statuses->update([
       'nameStatus' => $request->nameStatus,
    ]);

    return redirect()->route('index-status')->with('success', 'Status actualizado correctamente');
}
public function delete($id){
    $statuses=Status::FindOrFail($id);
    $statuses->delete();
    
    return redirect()->route('index-status')->with('success','Status actualizado correctamente');
    }
}
