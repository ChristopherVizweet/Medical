<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use App\Models\LotesAsistenciaInstaladores;
use App\Models\ProyectoAsistenciaInstaladores;
use Illuminate\Http\Request;

class ProyectoAsistenciaInstaladoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proyectos = ProyectoAsistenciaInstaladores::query()
            ->with('lotesAsistenciaInstaladores','lotesEmpleados') // Eager load the relationship
            ->orderBy('nombre_proyecto_asistencia')
            ->get();
           

        return view('employees.asistencia-instaladores', compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create-proyecto-asistencia-instaladores');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'proyecto_id' => ['required', 'exists:proyecto_asistencia_instaladores,id'],
            'fecha_lote_asistencia' => ['required', 'date'],
            'tipo_captura' => ['nullable', 'string', 'max:50'],
            'hora_entrada' => ['nullable', 'date_format:H:i'],
            'hora_salida' => ['nullable', 'date_format:H:i'],
            'status_asistencia' => ['nullable', 'in:pendiente,asistio,retardo,ausente'],
            'observaciones' => ['nullable', 'string'],
        ], [
            'proyecto_id.required' => 'Selecciona un proyecto.',
            'proyecto_id.exists' => 'El proyecto seleccionado no existe.',
            'fecha_lote_asistencia.required' => 'La fecha del lote es obligatoria.',
            'fecha_lote_asistencia.date' => 'La fecha del lote no es válida.',
        ]);

        LotesAsistenciaInstaladores::create([
            'proyecto_asistencia_instaladores_id' => $datos['proyecto_id'],
            'fecha_lote_asistencia' => $datos['fecha_lote_asistencia'],
            'tipo_captura' => $datos['tipo_captura'] ?? 'manual',
            'hora_entrada' => $datos['hora_entrada'] ?? null,
            'hora_salida' => $datos['hora_salida'] ?? null,
            'status_asistencia' => $datos['status_asistencia'] ?? 'pendiente',
            'observaciones' => $datos['observaciones'] ?? null,
        ]);

        return redirect()
            ->route('asistencia.instaladores')
            ->with('success', 'La asistencia se registró correctamente.');
    }

    public function storeProyecto(Request $request)
    {
        $datos = $request->validate([
            'nombre_proyecto_asistencia' => ['required', 'string', 'max:255'],
            'concepto_proyecto_asistencia' => ['nullable', 'string', 'max:255'],
        ], [
            'nombre_proyecto_asistencia.required' => 'El nombre del proyecto es obligatorio.',
        ]);

        ProyectoAsistenciaInstaladores::create($datos);

        return redirect()
            ->route('asistencia.instaladores')
            ->with('success', 'El proyecto se registró correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProyectoAsistenciaInstaladores $proyectoAsistenciaInstaladores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProyectoAsistenciaInstaladores $proyectoAsistenciaInstaladores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProyectoAsistenciaInstaladores $proyectoAsistenciaInstaladores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProyectoAsistenciaInstaladores $proyectoAsistenciaInstaladores)
    {
        //
    }
}
