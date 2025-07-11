<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;



class SupplierController extends Controller
{

    public function index(Request $request)
    {
        #if (!Auth::check() || !Auth::user()->hasRole('superadmin')) {
            #abort(403, 'No tienes acceso a esta sección');
        #}
        $select=Supplier::select();
        if($request->has('id') && !empty($request->id)){
            $select->where('id',$request->id);
        }
        $suppliers=Supplier::all();
        $suppliers = $select->get();
        
        return view('supplier.index_Supplier', compact('suppliers')); 
        
        #$suppliers = Supplier::all(); 
        #return view('supplier.index_Supplier', compact('suppliers')); }
    }
public function create(){
    return view('supplier.create_supplier');
}
public function store(Request $request) {
    // Validar y guardar datos
    $request->validate([
        'name_supplier' => 'required|string|max:255',
        'email_supplier' => 'required|email|unique:suppliers,email_supplier',
        'phoneNumber_supplier' => 'required|string|regex:/^[0-9]{10,15}$/',
    ]);

    Supplier::create([
        'name_supplier' => $request->name_supplier,
        'email_supplier' => $request->email_supplier,
        'phoneNumber_supplier' => $request->phoneNumber_supplier,
    ]);

    return redirect()->route('index_Supplier')->with('success', 'Proveedor creado exitosamente');
}
public function edit($id)
{
    $supplier = Supplier::findOrFail($id); // Busca el proveedor por ID
    return view('supplier.edit_supplier', compact('supplier')); // Carga la vista correcta
}
public function update(Request $request, $id)
{
    $request->validate([
        'name_supplier' => 'required|string|max:255',
        'email_supplier' => 'required|email|unique:suppliers,email_supplier,' . $id,
        'phoneNumber_supplier' => 'required|string|regex:/^[0-9]{10,15}$/',
    ]);

    $supplier = Supplier::findOrFail($id);
    $supplier->update([
        'name_supplier' => $request->name_supplier,
        'email_supplier' => $request->email_supplier,
        'phoneNumber_supplier' => $request->phoneNumber_supplier,
    ]);

    return redirect()->route('index_Supplier')->with('success', 'Proveedor actualizado correctamente');
}
public function delete($id){
    $supplier=Supplier::findOrFail($id);
    $supplier->delete();
    return redirect()->route('index_Supplier')->with('success','Proveedor eliminado correctamente');

}

}
