<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Empleados;
use App\Models\Project;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
public function create(Project $project_id)
    {
       
        $empleados = Empleados::all(); // Obtener empleados asociados al proyecto
        return view('projects.payments.deducibles', compact('project_id', 'empleados'));
    }
    public function store_dedu(Request $request, Project $project_id)
    {
        //dd($request->payments);
        $validated = $request->validate([
            'payments' => 'required|array',
            'payments.*.tipo' => 'nullable|in:deducible,no_deducible',
            'payments.*.concepto' => 'nullable|string|max:255',
            'payments.*.fecha_recepcion' => 'nullable|date',
            'payments.*.folio' => 'nullable|string|max:255',  
            'payments.*.metodo_pago' => 'nullable|string|max:50',
            'payments.*.empleados_id' => 'nullable|exists:empleados,id',
            'payments.*.subtotal' => 'nullable|numeric|min:0',
            'payments.*.iva' => 'nullable|numeric|min:0',
            'payments.*.total' => 'nullable|numeric|min:0',
            'payments.*.comprobante_path' => 'nullable|file',
        ]);

        foreach ($validated['payments'] as $index => $gasto) {

            // Calcular el total
            if ($gasto['tipo']==='deducible'){
            $gasto['total'] = $gasto['subtotal'] * $gasto['iva'];
            } else {
            $gasto['total'] = $gasto['subtotal'];
                }
            // Guardar comprobante si existe
            $comprobantePath = null;
            if ($request->hasFile("payments.$index.comprobante_path")) {
                $comprobantePath = $request
                    ->file("payments.$index.comprobante_path")
                    ->store('comprobantes', 'public');
            }

            Payment::create([
                'project_id' => $project_id->id,
                'empleados_id' => $gasto['empleados_id'] ?? null,
                'tipo' => $gasto['tipo'],
                'concepto' => $gasto['concepto'],
                'fecha_recepcion' => $gasto['fecha_recepcion'],
                'folio' => $gasto['folio'] ?? null,
                'metodo_pago' => $gasto['metodo_pago'],
                'subtotal' => $gasto['subtotal'],
                'iva' => $gasto['iva'],
                'total' =>  $gasto['total'],
                'comprobante_path' => $comprobantePath,
                'es_planeado' => false,
            ]);
        }

         return redirect()->route('index-project')->with('success', 'Gastos actualizados correctamente.');
    }
    public function verPayments(Project $project_id)
    {
        $payments = Payment::with('empleado')->where('project_id',$project_id->id)->get();
        
        $empleados = Empleados::with('payments')->get();
        return view('projects.payments.ver-payments', compact('payments','empleados','project_id'));
    }
    public function print( $project_id){
        $projects = Project::findOrFail($project_id);
        $payments = Payment::with('empleado')->where('tipo','deducible')->where('project_id',$project_id)->get();
        $nopayment = Payment::with('empleado')->where('tipo','no_deducible')->where('project_id',$project_id)->get();
        $empleados = Empleados::with('payments')->get();
        $pagos = Payment::with(['empleado'])->where('project_id',$project_id)->get();
        $pdf = Pdf::loadView('projects.payments.ver-gastos', compact('pagos','empleados','projects', 'payments','nopayment'));
        return $pdf->stream('reporte_gastos_proyecto_'.$project_id.'.pdf'); 
    }
}