<?php

namespace App\Http\Controllers;
use App\Models\InstalationService;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Web\Service;

class ServiceController extends Controller
{
    public function index(){
        $services=InstalationService::all();
          return view('instalationService.index-service', compact('services'));
    }
    public function create(Request $request){
        return view('instalationService.create-service');
    }
    public function store(Request $request) {
        // Validar y guardar datos
        $request->validate([
            'nameInstalation' => 'required|string|max:50',
        ]);
    
        InstalationService::create([
            'nameInstalation' => $request->nameInstalation,
        ]);
        return redirect()->route('index-service')->with('success', 'Servicio creado exitosamente');
}
    public function edit($id){
        $services = InstalationService::findOrFail($id); // Busca el proveedor por ID
    return view('instalationService.edit-service', compact('services')); // Carga la vista correcta
    }
    public function update(Request $request, $id)
{
    $request->validate([
     'nameInstalation' => 'required|string|max:50',
    ]);

    $services = InstalationService::findOrFail($id);
    $services->update([
       'nameInstalation' => $request->nameInstalation,
    ]);

    return redirect()->route('index-service')->with('success', 'Servicio actualizado correctamente');
}
public function delete($id){
    $services=InstalationService::FindOrFail($id);
    $services->delete();
    
    return redirect()->route('index-service')->with('success','Servicio eliminado correctamente');
    }
}

