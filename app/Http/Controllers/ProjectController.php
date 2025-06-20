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
        $projects = Project::all();
        return view('projects.index-project', compact('projects'));
    }
    public function create(){
        $projects = Project::all();
        $priorities=Priority::all();
        $clients=Client::all();
        $companies=Company::all();
        $users=User::all();
        $services=InstalationService::all();
        $statues=Status::all();
        $recursos=Recursos::all();
        $banks=Bank::all();
        $suppliers=Supplier::all();
        $products=Product::all();
        return view('projects.create-project', compact('priorities','users','clients','companies','services','statues','recursos','banks','suppliers','products'));

    }
    public function store(Request $request) {
        // Validar y guardar datos
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
    'nameInstalation' => 'required|array|min:1',
    'nameInstalation.*' => 'required|string',

    // Mano de obra
    'id_empleado' => 'required|array|min:1',
    'id_empleado.*' => 'required|string|exists:users,id',
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

    
        Project::create([
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
            'id_instalationService' => implode(', ', $request->nameInstalation),
            'id_status' => $request->id_status,
            'requestDate' => $request->requestDate,
            'estimateDate' => $request->estimateDate,
            'authorizedDate' => $request->authorizedDate,
            'finishDate' => $request->finishDate,
            #'id_empleado' => $request->id_empleado,
            #'jornadas' => $request->jornadas,
            #'salario' => $request->salario,
            #'totalSalario' => $request->totalSalario,
            'totalManoObra' => $request->totalManoObra,
            #'id_product' => $request->id_product,
            #'id_supplier' => $request->id_supplier,
            #'costo' => $request->costo,
            'totalProductos' => $request->totalProductos,
            'recursosObtenidos' => $request->recursosObtenidos,
            'ejecutionDate' => $request->ejecutionDate,
            ##PRUEBA A VER SI FUNCIONA
            'id_empleado' => implode(', ', $request->id_empleado),
            'jornadas' => implode(', ', $request->jornadas),
            'salario' => implode(', ', $request->salario),
            'totalSalario' => implode(', ', $request->TotalSalario),
            #PRODUCTOS
            'id_product' => implode(', ', $request->id_product),
            'id_supplier' => implode(', ', $request->id_supplier),
            'costo' => implode(', ', $request->costo),
        ]);
        return redirect()->route('index-project')->with('success', 'Prioridad creada exitosamente');
}
public function miControlador()
{
    $dato = 'Este es un mensaje de prueba';
    dd($dato); // Imprime el valor de $dato y detiene la ejecución
}
public function edit($id)
{
    $projects = Project::findOrFail($id); // Busca el proveedor por ID
    return view('projects.edit-project', compact('projects')); // Carga la vista correcta
}
}
