<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Empleados;
use App\Models\Priority;
use App\Models\Project;
use App\Models\Client;
use App\Models\InstalationService;
use App\Models\User;
use App\Models\Company;
use App\Models\Product;
use App\Models\Recursos;
use App\Models\Status;
use App\Models\Supplier;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Token\Stack;

class ProjectController extends Controller
{
    public function index(){
        
        $projects = Project::with(['client', 'vendedor', 'encargado', 'compani', 'priority', 'status'])->get();
        return view('projects.index-project', compact('projects'));
    }
    public function create(){
        $projects = Project::all();
        $priorities=Priority::all();
        $clients=Client::all();
        $companies=Company::all();
        $users=User::all();
        $empleados=Empleados::all();
        $services=InstalationService::all();
        $statues=Status::all();
        $recursos=Recursos::all();
        $banks=Bank::all();
        $suppliers=Supplier::all();
        $products=Product::all();
        return view('projects.create-project', compact('services','empleados','priorities','users','clients','companies','services','statues','recursos','banks','suppliers','products'));

    }
    public function store(Request $request) {
        // Validar y guardar datos
        //dd($request->nameInstalation);

       $request->validate([
    'folioProject' => 'required|string|max:20',
    'id_client' => 'required|string|max:50',
    'nameProject' => 'required|string|max:255',
    'seller_id_usuario' => 'required|string|max:50',
    'company' => 'required|string|max:20',
    'inCharge_id_usuario' => 'required|string|max:50',
    'dateBegin' => 'required|date',
    'dateEnd' => 'required|date',
    'budget' => 'required|numeric|min:0',
    'accountBank' => 'required|string|max:100',
    'id_priority' => 'required|string|max:100',
    'id_status' => 'required|string|max:100',
    'requestDate' => 'required|date',
    'estimateDate' => 'required|date',
    'authorizedDate' => 'required|date',
    'finishDate' => 'required|date',
    'recursosObtenidos' => 'required|string',
    'ejecutionDate' => 'required|date',

    // Instalación (nombre como string[] porque es checkbox)
    //'nameInstalation' => 'required|array|min:1',
    //'nameInstalation.*' => 'required|string',

    //Servicios de instalación
    'nameInstalation' => 'required|array',
    'nameInstalation.*' => 'exists:instalation_services,id',

    // Mano de obra
    'id_empleado' => 'required|array|min:1',
    'id_empleado.*' => 'required|string|exists:empleados,id',
    'jornadas' => 'required|array',
    'jornadas.*' => 'required|integer|min:1',
    'salario' => 'required|array',
    'salario.*' => 'required|numeric|min:0',
    'TotalSalario' => 'required|array',
    'TotalSalario.*' => 'required|numeric|min:0',

    // Productos
    'id_product' => 'required|array|min:1',
    'id_product.*' => 'required|exists:products,id',
    'id_supplier' => 'required|array|min:1',
    'id_supplier.*' => 'required|exists:suppliers,id',
    'costo' => 'required|array|min:1',
    'costo.*' => 'required|numeric|min:0',

    // Totales
    'totalManoObra' => 'required|numeric|min:0',
    'totalProductos' => 'required|numeric|min:0',
    
]);

    
       $project = Project::create([
        'folioProject' => $request->folioProject,
        'id_client'  => $request->id_client,
        'nameProject' => $request->nameProject,
        'seller_id_usuario' => $request->seller_id_usuario,
        'company' => $request->company,
        'inCharge_id_usuario' => $request->inCharge_id_usuario,
        'dateBegin' => $request->dateBegin,
        'dateEnd' => $request->dateEnd,
        'budget' => $request->budget,
        'accountBank' => $request->accountBank,
        'id_priority' => $request->id_priority,
        #'id_instalationService' => implode(', ', $request->nameInstalation),
        

        'id_status' => $request->id_status,
        'requestDate' => $request->requestDate,
        'estimateDate' => $request->estimateDate,
        'authorizedDate' => $request->authorizedDate,
        'finishDate' => $request->finishDate,
        'totalManoObra' => $request->totalManoObra,
        'totalProductos' => $request->totalProductos,
        'recursosObtenidos' => $request->recursosObtenidos,
        'ejecutionDate' => $request->ejecutionDate,
    ]);

    foreach ($request->id_empleado as $index => $empleadoId) {
        $project->empleados()->create([
            'id_empleado' => $empleadoId,
            'jornadas' => $request->jornadas[$index],
            'salario' => $request->salario[$index],
            'total_salario' => $request->TotalSalario[$index],
        ]);
    }

    foreach ($request->id_product as $index => $productId) {
        $project->productos()->create([
            'product_id' => $productId,
            'supplier_id' => $request->id_supplier[$index],
            'costo' => $request->costo[$index],
        ]);
    }
   
    $project->services()->sync($request->nameInstalation);

    return redirect()->route('index-project')->with('success', 'Proyecto creado exitosamente');
}

public function edit($id)
{
     $projects = Project::all();
        $priorities=Priority::all();
        $clients=Client::all();
        $companies=Company::all();
        $users=User::all();
        $empleados=Empleados::all();
        $services=InstalationService::all();
        $statues=Status::all();
        $recursos=Recursos::all();
        $banks=Bank::all();
        $suppliers=Supplier::all();
        $products=Product::all();
        $jornadas=Empleados::all();
    $projects = Project::findOrFail($id); // Busca el proveedor por ID
    return view('projects.edit-project', compact('jornadas','priorities','clients','companies','users','empleados',
    'services','statues','recursos','banks','suppliers','products','projects')); // Carga la vista correcta
}
public function update(Request $request,$id){
    $request->validate([
    'folioProject' => 'required|string|max:20',
    'id_client' => 'required|string|max:50',
    'nameProject' => 'required|string|max:255',
    'seller_id_usuario' => 'required|string|max:50',
    'company' => 'required|string|max:20',
    'inCharge_id_usuario' => 'required|string|max:50',
    'dateBegin' => 'required|date',
    'dateEnd' => 'required|date',
    'budget' => 'required|numeric|min:0',
    'accountBank' => 'required|string|max:100',
    'id_priority' => 'required|string|max:100',
    'id_status' => 'required|string|max:100',
    'requestDate' => 'required|date',
    'estimateDate' => 'required|date',
    'authorizedDate' => 'required|date',
    'finishDate' => 'required|date',
    'recursosObtenidos' => 'required|string',
    'ejecutionDate' => 'required|date',

    // Instalación (nombre como string[] porque es checkbox)
    //'nameInstalation' => 'required|array|min:1',
    //'nameInstalation.*' => 'required|string',

    //Servicios de instalación
    'nameInstalation' => 'required|array',
    'nameInstalation.*' => 'exists:instalation_services,id',

    // Mano de obra
    'id_empleado' => 'required|array|min:1',
    'id_empleado.*' => 'required|string|exists:empleados,id',
    'jornadas' => 'required|array',
    'jornadas.*' => 'required|integer|min:1',
    'salario' => 'required|array',
    'salario.*' => 'required|numeric|min:0',
    'TotalSalario' => 'required|array',
    'TotalSalario.*' => 'required|numeric|min:0',

    // Productos
    'id_product' => 'required|array|min:1',
    'id_product.*' => 'required|exists:products,id',
    'id_supplier' => 'required|array|min:1',
    'id_supplier.*' => 'required|exists:suppliers,id',
    'costo' => 'required|array|min:1',
    'costo.*' => 'required|numeric|min:0',

    // Totales
    'totalManoObra' => 'required|numeric|min:0',
    'totalProductos' => 'required|numeric|min:0',
    ]);

    $projects = Project::findOrFail($id);
    $projects->update([
        'folioProject' => $request->folioProject,
        'id_client'  => $request->id_client,
        'nameProject' => $request->nameProject,
        'seller_id_usuario' => $request->seller_id_usuario,
        'company' => $request->company,
        'inCharge_id_usuario' => $request->inCharge_id_usuario,
        'dateBegin' => $request->dateBegin,
        'dateEnd' => $request->dateEnd,
        'budget' => $request->budget,
        'accountBank' => $request->accountBank,
        'id_priority' => $request->id_priority,
        #'id_instalationService' => implode(', ', $request->nameInstalation),
        'id_status' => $request->id_status,
        'requestDate' => $request->requestDate,
        'estimateDate' => $request->estimateDate,
        'authorizedDate' => $request->authorizedDate,
        'finishDate' => $request->finishDate,
        'totalManoObra' => $request->totalManoObra,
        'totalProductos' => $request->totalProductos,
        'recursosObtenidos' => $request->recursosObtenidos,
        'ejecutionDate' => $request->ejecutionDate,
    ]);
    $projects->empleados()->delete();
    foreach ($request->id_empleado as $index => $empleadoId) {
        $projects->empleados()->create([
            'id_empleado' => $empleadoId,
            'jornadas' => $request->jornadas[$index],
            'salario' => $request->salario[$index],
            'total_salario' => $request->TotalSalario[$index],
        ]);
    }
    $projects->productos()->delete();
    foreach ($request->id_product as $index => $productId) {
        $projects->productos()->create([
            'product_id' => $productId,
            'supplier_id' => $request->id_supplier[$index],
            'costo' => $request->costo[$index],
        ]);
    }
$project = Project::with('empleados')->find($id); // si usas un modelo intermedio tipo ProjectEmployee
$products = Product::all();
$suppliers = Supplier::all();
$project = Project::with('productos')->find($id);
$project->services()->sync($request->nameInstalation); //Actualiza y guarda  el cambio en la modificación

    return redirect()->route('index-project')->with('success', 'Proyecto actualizado exitosamente');
}
    
public function delete($id){
    $projects=Project::FindOrFail($id);
    $projects->delete();
    
    return redirect()->route('index-project')->with('success','Proyecto eliminado correctamente');
    }
}

