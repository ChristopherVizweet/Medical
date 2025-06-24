<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
     public function index(Request $request){
    $empleados=Empleados::all();
    return view('employees.index-employees', compact('empleados')); 
     }
     public function create(Request $request){
        return view('employees.create-employees'); 
     }
     public function store(Request $request){
      // Validar y guardar datos
    $request->validate([
        'curp' => 'required|string|max:20',
        'Nombre' => 'required|string|max:30',
        'apellidos' => 'required|string|max:22',
        'organizacion' => 'required|string|max:20',
        'cargo' => 'required|string|max:30',
        'correoElectronico' => 'nullable|email',
        'numeroTelefonoTrabajo' => 'required|string|max:15',
        'numeroTelParti' => 'nullable|string|max:15',
        'sueldo' => 'required|numeric|min:0',
        'calle' => 'required|string|max:255',
        'ciudad' => 'required|string|max:10',
        'estadoProv' => 'required|string|max:20',
        'codigoPostal' => 'required|integer',
        'pais' => 'required|string|max:15',
        'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        'tipoSangre'=>'nullable|string|max:20',
    ]);

    $imagePath = $request->hasFile('foto') 
            ? $request->file('foto')->store('images', 'public') 
            : null;

             // Crear el producto
        Empleados::create([
            'curp'=>$request->curp,
            'Nombre'=>$request->Nombre,
            'apellidos'=>$request->apellidos,
            'organizacion'=>$request->organizacion,
            'cargo'=>$request->cargo,
            'correoElectronico'=>$request->correoElectronico,
            'numeroTelefonoTrabajo'=>$request->numeroTelefonoTrabajo,
            'numeroTelParti'=>$request->numeroTelParti,
            'sueldo'=>$request->sueldo,
            'calle'=>$request->calle,
            'ciudad'=>$request->ciudad,
            'estadoProv'=>$request->estadoProv,
            'codigoPostal'=>$request->codigoPostal,
            'pais'=>$request->pais,
            'foto' => $imagePath, // Guardamos la ruta de la imagen
            'tipoSangre' => $request->tipoSangre,
        ]);



    return redirect()->route('index-employees')->with('success', 'Empleado creado exitosamente');
}
    /*public function view($id){
        $empleados = Empleados::findOrFail($id); // Busca el proveedor por ID
    return view('employees.viewEmployees', compact('empleados')); // Carga la vista correcta
    }*/
    public function edit($id){
    $empleados = Empleados::findOrFail($id); // Busca el proveedor por ID
    return view('employees.edit-employees', compact('empleados')); // Carga la vista correcta
    }

public function update(Request $request, $id)
{
    $request->validate([
    'curp' => 'required|string|max:20',
        'Nombre' => 'required|string|max:10',
        'apellidos' => 'required|string|max:22',
        'organizacion' => 'required|string|max:20',
        'cargo' => 'required|string|max:30',
        'correoElectronico' => 'required|email',
        'numeroTelefonoTrabajo' => 'required|string|max:15',
        'numeroTelParti' => 'required|string|max:15',
        'sueldo' => 'required|numeric|min:0',
        'calle' => 'required|string|max:50',
        'ciudad' => 'required|string|max:10',
        'estadoProv' => 'required|string|max:20',
        'codigoPostal' => 'required|integer',
        'pais' => 'required|string|max:15',
        'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        'tipoSangre'=>'required|string|max:20',
    ]);

    $imagePath1 = $request->hasFile('foto') 
            ? $request->file('foto')->store('images', 'public') 
            : $request -> input('foto_actual');

    $empleados = Empleados::findOrFail($id);
    $empleados->update([
        'curp'=>$request->curp,
            'Nombre'=>$request->Nombre,
            'apellidos'=>$request->apellidos,
            'organizacion'=>$request->organizacion,
            'cargo'=>$request->cargo,
            'correoElectronico'=>$request->correoElectronico,
            'numeroTelefonoTrabajo'=>$request->numeroTelefonoTrabajo,
            'numeroTelParti'=>$request->numeroTelParti,
            'sueldo'=>$request->sueldo,
            'calle'=>$request->calle,
            'ciudad'=>$request->ciudad,
            'estadoProv'=>$request->estadoProv,
            'codigoPostal'=>$request->codigoPostal,
            'pais'=>$request->pais,
            'foto' => $imagePath1, // Guardamos la ruta de la imagen
            'tipoSangre' => $request->tipoSangre,
    ]);

    return redirect()->route('index-employees')->with('success','Empleado actualizado correctamente');
}

public function delete($id){
$empleados=Empleados::FindOrFail($id);
$empleados->delete();

return redirect()->route('index-employees')->with('success','Empleado eliminado correctamente');
     }
    }
