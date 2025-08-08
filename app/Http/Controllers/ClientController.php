<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
class ClientController extends Controller
{
  public function index(Request $request){
    /*$select=Client::select();
    if($request->has('RFC')&& !empty($request->RFC)){
      $select->where('RFC',$request->RFC);
    }
    $select2=Client::select();
    if($request->has('name_Client')&& !empty($request->name_Client)){
      $select2->where('name_Client',$request->name_Client);
    }

    $clients = $select->get(); // Cambié de $supplier a $suppliers para que coincida con la vista
    $clients = $select2->get();
    return view('client.index-client', compact('clients'));*/

    $clientsQuery = Client::query();

    if ($request->filled('RFC')) {
        $clientsQuery->where('RFC', $request->RFC);
    }

    if ($request->filled('name_Client')) {
        $clientsQuery->where('name_Client', $request->name_Client);
    }

    $clients = $clientsQuery->get();

    return view('client.index-client', compact('clients'));
  }
  public function create(){
    return view('client.create-client');
  }
 
  
  public function store(Request $request) {
    // Validar y guardar datos
    $request->validate([
        'name_Client' => 'required|string|max:255',
        'address_Client' => 'required|string|max:255',
        'email_Client' => 'required|email|unique:clients,email_Client',
        'phoneNumber_Client' => 'required|string|regex:/^[0-9]{10,15}$/',
        'RFC' => 'required|string',
    ]);

    Client::create([
        'name_Client' => $request->name_Client,
        'address_Client'=> $request->address_Client,
        'email_Client' => $request->email_Client,
        'phoneNumber_Client' => $request->phoneNumber_Client,
        'RFC'=>$request->RFC,
    ]);


    return redirect()->route('index-client')->with('success', 'Cliente creado exitosamente');
}

public function edit($id)
{
    $client = Client::findOrFail($id); // Busca el proveedor por ID
    return view('client.edit_client', compact('client')); // Carga la vista correcta
}
public function update(Request $request, $id)
{
    $request->validate([
     'name_Client' => 'required|string|max:255',
        'address_Client' => 'required|string|max:255',
        'email_Client' => 'required|email|unique:clients,email_Client',
        'phoneNumber_Client' => 'required|string|regex:/^[0-9]{10,15}$/',
        'RFC' => 'required|string',
    ]);

    $client = Client::findOrFail($id);
    $client->update([
       'name_Client' => $request->name_Client,
        'address_Client'=> $request->address_Client,
        'email_Client' => $request->email_Client,
        'phoneNumber_Client' => $request->phoneNumber_Client,
        'RFC'=>$request->RFC,
    ]);

    return redirect()->route('index-client')->with('success', 'Cliente actualizado correctamente');
}
public function delete($id){
$client=Client::FindOrFail($id);
$client->delete();

return redirect()->route('index-client')->with('success','Cliente eliminado correctamente');
}
}


