<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    

public function index()
{
    $suppliers = Supplier::all(); // Cambié de $supplier a $suppliers para que coincida con la vista
    return view('supplier.index_Supplier', compact('suppliers')); // Pasar la variable correctamente
}
public function create(){
    return view('supplier.create_supplier');
}
public function store(Request $request) {
    // Validar y guardar datos
    $request->validate([
        'name_supplier' => 'required|string|max:255',
        'email_supplier' => 'required|email|unique:suppliers,email',
        'phoneNumber_supplier' => 'required|integer|',
    ]);

    Supplier::create([
        'name_supplier' => $request->name_supplier,
        'email_supplier' => $request->email_supplier,
        'phoneNumber_supplier' => $request->phoneNumber_supplier,
    ]);

    return redirect()->route('create_supplier')->with('success', 'Proveedor creado exitosamente');
}
}
