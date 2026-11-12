<?php

namespace App\Http\Controllers;

use App\Models\CatalogoPartidaRd;
use App\Models\Cotizacion;
use App\Models\CotizacionPartidaDetalleRed;
use App\Models\CotizacionSeccion;
use Illuminate\Http\Request;

class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $detalles = CotizacionPartidaDetalleRed::all();
         //$materiales=CotizacionPartidaDetalleRed::all();
        //$detalles = CotizacionPartidaDetalleRed::with('seccion', 'catalogo', 'producto')->get();
        return view('cotizaciones.index-cotizacion', compact('detalles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $detalles = CotizacionPartidaDetalleRed::with('seccion', 'catalogo', 'producto')->get();
        $secciones=CotizacionSeccion::with('productos')->get();
        $catalogos=CatalogoPartidaRd::with('productos')->get();
         $materiales=CotizacionPartidaDetalleRed::all();
        return view('index-cotizacion',compact('secciones','catalogos','detalles','materiales'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'concepto_detalle_rm_id' => 'nullable|integer',
            'unidad_detalle_rm' => 'nullable|string|max:255',
            'cantidad_detalle_rm' => 'nullable|numeric',
            'precio_unitario_detalle_rm' => 'nullable|numeric',
            'importe_detalle_rm' => 'nullable|numeric',
        ]);
        CotizacionPartidaDetalleRed::create([
            'concepto_detalle_rm_id' => $request->input('concepto_detalle_rm_id'),
            'unidad_detalle_rm' => $request->input('unidad_detalle_rm'),
            'cantidad_detalle_rm' => $request->input('cantidad_detalle_rm'),
            'precio_unitario_detalle_rm' => $request->input('precio_unitario_detalle_rm'),
            'importe_detalle_rm' => $request->input('importe_detalle_rm'),
        ]);
        return redirect()->route('index-cotizacion')->with('success', 'Cotización creada exitosamente');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cotizacion $cotizacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cotizacion $cotizacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cotizacion $cotizacion)
    {
        //
    }
}
