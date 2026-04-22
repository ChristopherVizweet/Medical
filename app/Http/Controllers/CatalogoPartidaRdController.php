<?php

namespace App\Http\Controllers;

use App\Models\CatalogoPartidaRd;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class CatalogoPartidaRdController extends Controller
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
            'nombre_rm'=>'nullable|string|max:100',
            'tipo_rm'=>'nullable|string|max:100',
            'descripcion_rm'=>'nullable|string|max:100' 
        ]);
        CatalogoPartidaRd::created([
            'nombre_rm'=>$request->nombre_rm,
            'tipo_rm'=>$request->tipo_rm,
            'descripcion_rm'=>$request->descripcion_rm
        ]);
        return redirect()->route('index-cotizacion')->with('success', 'Nuevo catalogo creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(CatalogoPartidaRd $catalogoPartidaRd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CatalogoPartidaRd $catalogoPartidaRd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CatalogoPartidaRd $catalogoPartidaRd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CatalogoPartidaRd $catalogoPartidaRd)
    {
        //
    }
}
