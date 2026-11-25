<?php

namespace App\Http\Controllers;

use App\Models\CatalogoPartidaRd;
use App\Models\Cotizacion;
use App\Models\CotizacionPartidaDetalleRedes;
use App\Models\CotizacionSeccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $detalles = CotizacionPartidaDetalleRedes::all();
         //$materiales=CotizacionPartidaDetalleRed::all();
        //$detalles = CotizacionPartidaDetalleRed::with('seccion', 'catalogo', 'producto')->get();
        return view('cotizaciones.index-cotizacion',compact('detalles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $detalles = CotizacionPartidaDetalleRedes::with('seccion', 'catalogo', 'producto')->get();
        $secciones=CotizacionSeccion::with('productos')->get();
        $catalogos=CatalogoPartidaRd::with('productos')->get();
         $materiales=CotizacionPartidaDetalleRedes::all();
        return view('index-cotizacion',compact('secciones','catalogos','detalles','materiales'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'detalles' => 'required|array|min:1',
            'detalles.*.descripcion_detalle_rm' => 'nullable|string|max:255',
            'detalles.*.concepto_detalle_rm_id' => 'nullable|integer',
            'detalles.*.unidad_detalle_rm' => 'nullable|string|max:255',
            'detalles.*.cantidad_detalle_rm' => 'nullable|numeric',
            'detalles.*.precio_detalle_rm' => 'nullable|numeric',
            'detalles.*.importe_detalle_rm' => 'nullable|numeric',
        ]);

        DB::transaction(function () use ($validated) {
            foreach ($validated['detalles'] as $detalle) {
                CotizacionPartidaDetalleRedes::create($detalle);
            }
        });

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
