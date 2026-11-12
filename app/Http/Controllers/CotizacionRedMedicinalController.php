<?php

namespace App\Http\Controllers;

use App\Models\CotizacionRedMedicinal;
use Illuminate\Http\Request;

class CotizacionRedMedicinalController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_gas_medicinal'=>'nullable|string|max:100', 
            'status'=>'nullable|string|max:100'
        ]);
        CotizacionRedMedicinal::create([
            'nombre_gas_medicinal'=>$request->nombre_gas_medicinal,
            'status'=>$request->status
        ]);
        return redirect()->route('index-cotizacion')->with('success', 'Partida creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(CotizacionRedMedicinal $cotizacionRedMedicinal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CotizacionRedMedicinal $cotizacionRedMedicinal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CotizacionRedMedicinal $cotizacionRedMedicinal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CotizacionRedMedicinal $cotizacionRedMedicinal)
    {
        //
    }
}
