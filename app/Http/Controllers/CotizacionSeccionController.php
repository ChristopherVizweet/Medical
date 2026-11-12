<?php

namespace App\Http\Controllers;

use App\Models\CotizacionSeccion;
use Illuminate\Http\Request;

class CotizacionSeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $secciones=CotizacionSeccion::with('productos')->get();
        return view('cotizaciones.index-cotizacion',compact('secciones'));
    }

    /**https://tasks.google.com/tasks/?utm_source=OGB&utm_medium=app
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nameSection' => 'nullable|string|max:100'
        ]);
        CotizacionSeccion::create([
            'nameSection'=>$request->nameSection
        ]);
        return redirect()->route('index-cotizacion')->with('success', 'Sección creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(CotizacionSeccion $cotizacionSeccion)
    {
          $secciones=CotizacionSeccion::with('productos')->get();
        return view('index-cotizacion',compact('secciones'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CotizacionSeccion $cotizacionSeccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CotizacionSeccion $cotizacionSeccion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CotizacionSeccion $cotizacionSeccion)
    {
        //
    }
}
