<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFacturaRequest;
use App\Http\Requests\UpdateFacturaRequest;
use App\Models\Company;
use App\Models\Empleados;
use App\Models\Factura;
use App\Models\Product;
use App\Models\Project;
use App\Models\Supplier;
use App\Models\User;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facturas = Factura::all();
        return view('facturas.index-facturas',compact('facturas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
        $users = User::whereHas('roles', function($query) {
            $query->where('name', 'almacen');
        })->get();
        $proyectos = Project::all();
        $productos = Product::all();
        $proveedores = Supplier::all();
        $empresas = Company::all();
        $empleados = Empleados::all();
        return view('facturas.create-facturas', compact('proyectos','users','productos','proveedores','empresas', 'empleados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFacturaRequest $request)
    {
        //Validar y guardar datos de la factura
        //dd( $request->all());
        $request->validate([
            'rfc_emisor'=>'nullable|string',
            'nombre_emisor'=>'nullable|string',
            'rfc_receptor'=>'nullable|string',
            'nombre_receptor'=>'nullable|string|max:100',
            'folio_factura'=>'nullable|string|max:50',
            'folio_fiscal'=>'nullable|string',
            'fecha_emision'=>'nullable|date',
            'fecha_vencimiento'=>'nullable|date',
            'fecha_pago'=>'nullable|date',
            'recibe_factura'=>'nullable|string|max:100',
            'destino_factura'=>'nullable|string|max:100',
            'responsable_almacen_id_factura'=>'nullable|exists:empleados,id',
            'responsable_chofer_id_factura'=>'nullable|exists:empleados,id',
            'responsable_obra_factura'=>'nullable|exists:empleados,id',
            'obra_factura'=>'nullable|exists:projects,id',
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
        Factura::create([
            'rfc_emisor'=>$request->rfc_emisor,
            'nombre_emisor'=>$request->nombre_emisor,
            'rfc_receptor'=>$request->rfc_receptor,
            'nombre_receptor'=>$request->nombre_receptor,
            'folio_factura'=>$request->folio_factura,  
            'folio_fiscal'=>$request->folio_fiscal,
            'fecha_emision'=>$request->fecha_emision,
            'fecha_vencimiento'=>$request->fecha_vencimiento,
            'fecha_pago'=>$request->fecha_pago,
            'recibe_factura'=>$request->recibe_factura,
            'destino_factura'=>$request->destino_factura,
            'responsable_almacen_id_factura'=>$request->responsable_almacen_id_factura,
            'responsable_chofer_id_factura'=>$request->responsable_chofer_id_factura,
            'responsable_obra_factura'=>$request->responsable_obra_factura,
            'obra_factura'=>$request->obra_factura,
            'comprobante_pdf'=>$pdfPath,
            'comprobante_xml'=>$xmlPath,
            'status_factura'=>$request->status_factura,
            'total_factura'=>$request->total_factura,
            'observaciones_factura'=>$request->observaciones_factura,
        ]);
        return redirect()->route('index-facturas')->with('success', 'Factura creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Factura $factura)
    {
        /**AQui estar como plantilla APP.layout y mostrara como un edit
         SIN OPCION a modificar o editar.*/
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Factura $factura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFacturaRequest $request, Factura $factura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Factura $factura)
    {
        //
    }
}
