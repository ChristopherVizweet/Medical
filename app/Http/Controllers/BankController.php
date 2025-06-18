<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
     public function index(){
     $banks=Bank::all();
        return view('bank.index-bank', compact('banks'));
    }
    public function create(Request $request){
        return view('bank.create-bank');
    }
    public function store(Request $request) {
        // Validar y guardar datos
        $request->validate([
            'accountBank' => 'required|string|max:255',
        ]);
    
        Bank::create([
            'accountBank' => $request->accountBank,
        ]);
        return redirect()->route('index-bank')->with('success', 'Cuenta bancaria creada exitosamente');
}
    public function edit($id){
        $banks = Bank::findOrFail($id); // Busca el proveedor por ID
    return view('bank.edit-bank', compact('banks')); // Carga la vista correcta
    }
    public function update(Request $request, $id)
{
    $request->validate([
     'accountBank' => 'required|string|max:255',
    ]);

    $banks = Bank::findOrFail($id);
    $banks->update([
       'accountBank' => $request->accountBank,
    ]);

    return redirect()->route('index-bank')->with('success', 'Cuenta bancaria actualizada correctamente');
}
public function delete($id){
    $banks=bank::FindOrFail($id);
    $banks->delete();
    
    return redirect()->route('index-bank')->with('success','Cuenta bancaria eliminada correctamente');
    }
}
