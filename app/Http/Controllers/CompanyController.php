<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(){
     $companies=Company::all();
        return view('company.index-company', compact('companies'));
    }
    public function create(Request $request){
        return view('company.create-company');
    }
    public function store(Request $request) {
        // Validar y guardar datos
        $request->validate([
            'nameCompany' => 'required|string|max:50',
        ]);
    
        Company::create([
            'nameCompany' => $request->nameCompany,
        ]);
        return redirect()->route('index-company')->with('success', 'Empresa creada exitosamente');
}
    public function edit($id){
        $companies = Company::findOrFail($id); // Busca el proveedor por ID
    return view('company.edit-company', compact('companies')); // Carga la vista correcta
    }
    public function update(Request $request, $id)
{
    $request->validate([
     'nameCompany' => 'required|string|max:50',
    ]);

    $companies = Company::findOrFail($id);
    $companies->update([
       'nameCompany' => $request->nameCompany,
    ]);

    return redirect()->route('index-company')->with('success', 'Empresa actualizada correctamente');
}
public function delete($id){
    $companies=Company::FindOrFail($id);
    $companies->delete();
    
    return redirect()->route('index-company')->with('success','Empresa eliminada correctamente');
    }
}
