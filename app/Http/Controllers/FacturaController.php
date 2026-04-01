<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFacturaRequest;
use App\Http\Requests\UpdateFacturaRequest;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Empleados;
use App\Models\Factura;
use App\Models\Product;
use App\Models\Project;
use App\Models\Supplier;
use App\Models\User;
use SebastianBergmann\Environment\Console;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Cargar facturas con todas sus relaciones para optimizar consultas
        $facturas = Factura::with([
            'proyectos',
            'entradas',
            'supplier',
            'empresa',
            'usuario',
            'proyecto'
        ])->orderBy('id','desc')->get();

        return view('facturas.index-facturas', compact('facturas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Factura $factura)
    {
        // Usuarios con rol de almacén
        $users = User::whereHas('roles', function($query) {
            $query->where('name', 'almacen');
        })->get();

        // Proyectos activos (para el select)
        $proyectos = Project::all();
        // Productos disponibles (para el select)
        $productos = Product::all();
        // Proveedores (para el select)
        $proveedores = Supplier::all();
        // Empresas (para el select)
        $empresas = Company::all();
        // Empleados (para los selects de responsables)
        $empleados = Empleados::all();

        return view('facturas.create-facturas',
        compact('users','proyectos','productos','proveedores',
        'empresas','empleados'));
    }

    public function store(StoreFacturaRequest $request, Factura $factura)
    {
        //Validar y guardar datos de la factura
        //dd( $request->all());
        $request->validate([
            'user_id'=>'required_if:recibe_factura,almacen|nullable|exists:users,id',
            'empleado_id'=>'required_if:recibe_factura,chofer|nullable|exists:empleados,id',
            'destino_factura'=>'required_if:recibe_factura,chofer|nullable',
            'project_id'=>'required_if:destino_factura,obra|nullable|exists:projects,id',
            'rfc_emisor'=>'nullable|string',
            'nombre_emisor'=>'nullable|string',
            'rfc_receptor'=>'nullable|string',
            'nombre_receptor'=>'nullable|string|max:100',
            'responsable_almacen_id'=>'nullable|string|max:100',
            'responsable_chofer_id'=>'nullable|string|max:100',
            'folio_factura'=>'nullable|string|max:50',
            'folio_fiscal'=>'nullable|string',
            'fecha_emision'=>'nullable|date',
            'fecha_vencimiento'=>'nullable|date',
            'fecha_pago'=>'nullable|date',
            'recibe_factura'=>'nullable|string|max:100',
            'destino_factura'=>'nullable|string|max:100',
            'obra_factura_id'=>'nullable|string|max:100',
            'comprobante_pdf'=>'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'comprobante_xml'=>'nullable|file|mimes:xml|max:4096',
            'status_factura'=>'nullable|string|max:50',
            'total_factura'=>'nullable|numeric|min:0',
            'observaciones_factura'=>'nullable|string|max:255',
        ]);

        //Guardar la imagen del comprobante si se proporciona
        $pdfPath = $request->hasFile('comprobante_pdf')
            ? $request->file('comprobante_pdf')->store('facturas', 'public')
            : null;
        $xmlPath = $request->hasFile('comprobante_xml')
            ? $request->file('comprobante_xml')->store('facturas/xml', 'public')
            : null;

        //Crear la factura
        $proyectos = $request->project_id ? Project::find($request->project_id):null;
        $usuarios = $request->user_id ? User::find($request->user_id):null;
        $empleados = $request->empleado_id ? Empleados::find($request->empleado_id):null;
        $company = Company::findOrFail($request->company_id);
        $supplier = Supplier::findOrFail($request->supplier_id);

        $factura=Factura::create([ //Aqui guarda toda la informacion de la creacion de la factura en la variable $factura
            'company_id'=>$company->id, //Guarda FK de empresa en company_id
            'supplier_id'=>$supplier->id, //Guarda FK de supplier en supplier_id
            //'user_id'=>$usuarios->id, //Guarda FK de emlpeado en user_id
            //'empleado_id'=>$empleados->id,
            'project_id'=>$proyectos?->project_id,
            #Campos que no son llaves foraneas
            'rfc_emisor'=>$supplier->rfc_supplier,
            'nombre_emisor'=>$supplier->name_supplier,
            'rfc_receptor'=>$company->rfc_company,
            'nombre_receptor'=>$company->nameCompany,
            'responsable_almacen_id'=>$usuarios?->name,
            'responsable_chofer_id' =>$empleados?->Nombre,
            'folio_factura'=>$request->folio_factura,
            'folio_fiscal'=>$request->folio_fiscal,
            'fecha_emision'=>$request->fecha_emision,
            'fecha_vencimiento'=>$request->fecha_vencimiento,
            'fecha_pago'=>$request->fecha_pago,
            'recibe_factura'=>$request->recibe_factura,
            'destino_factura'=>$request->destino_factura,
            'obra_factura_id'=>$proyectos?->nameProject,
            'comprobante_pdf'=>$pdfPath,
            'comprobante_xml'=>$xmlPath,
            'status_factura'=>$request->status_factura,
            'total_factura'=>$request->total_factura,
            'observaciones_factura'=>$request->observaciones_factura,
            
        ]);
        //dd( $request->all());
        

        return redirect()->route('create-entradas',$factura->id)->with('success', 'Factura creada exitosamente');
    }
    
    /**
     * Controlador para la creacion y guardado de campos para la entrada sin factura
     */

    
    public function edit($id)
    {
        //Captura el registro mediante el ID de la factura
        $factura=Factura::findOrFail($id);
        // Usuarios con rol de almacén
        $users = User::whereHas('roles', function($query) {
            $query->where('name', 'almacen');
        })->get();

        // Proyectos activos (para el select)
        $proyectos = Project::all();
        // Productos disponibles (para el select)
        $productos = Product::all();
        // Proveedores (para el select)
        $proveedores = Supplier::all();
        // Empresas (para el select)
        $empresas = Company::all();
        // Empleados (para los selects de responsables)
        $empleados = Empleados::all();

        return view('facturas.edit-facturas',
        compact('users','proyectos','productos','proveedores',
        'empresas','empleados','factura'));
        
    }

   public function update(Request $request, $id)
{
    $validated = $request->validate([
        'status_factura' => 'required|in:pendiente,completado',
        'fecha_pago'     => 'nullable|date',
    ]);

    $factura = Factura::findOrFail($id);

    $factura->update($validated);

    return redirect()
        ->route('index-facturas')
        ->with('success', 'Factura actualizada satisfactoriamente');
}
    public function show($id)
        {
            //Captura el registro mediante el ID de la factura
            $factura=Factura::findOrFail($id); 
            // Usuarios con rol de almacén
            $users = User::whereHas('roles', function($query) {
                $query->where('name', 'almacen');
            })->get();
            // Proyectos activos (para el select)
            $proyectos = Project::all();
            // Productos disponibles (para el select)
            $productos = Product::all();
            // Proveedores (para el select)
            $proveedores = Supplier::all();
            // Empresas (para el select)
            $empresas = Company::all();
            // Empleados (para los selects de responsables)
            $empleados = Empleados::all();
            return view('facturas.show-facturas',compact('factura','users','proyectos','productos','proveedores',
            'empresas','empleados'));
        }
    
    public function destroy(Factura $factura)
    {
        //
    }
}
