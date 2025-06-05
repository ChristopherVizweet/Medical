<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRole;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index(){
        $users = User::with('roles')->get();
        $users = User::all(); 
        return view('user.index-user', compact('users')); 
    }

    public function create(){
        return view('user.create-user');
      }
      public function store(Request $request)
      {
          $validated = $request->validate([
              'name' => 'required|string|max:255',
              'ap_user' => 'required|string|max:255',
              'am_user' => 'required|string|max:255',
              'email' => 'required|email|max:255',
              'password' => 'required|string|min:8|confirmed',
              'role' => 'required|string|exists:roles,name', 
          ]);
      
          $user=User::create([
              'name' => $validated['name'],
              'ap_user' => $validated['ap_user'],
              'am_user' => $validated['am_user'],
              'email' =>  $validated['email'],
              'password' => Hash::make($validated['password']), // Se encripta la contraseña
              'role' =>$validated['role'],
            ]);
            $user->assignRole($validated['role']); // Asignamos el rol
            $user->getRoleNames();
          return redirect()->route('index-user')->with('success', 'Usuario registrado exitosamente');
      }
    public function edit($id)
{
    $user = User::findOrFail($id); // Busca el proveedor por ID
    return view('user.edit-user', compact('user')); // Carga la vista correcta
}
public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'ap_user' => 'required|string|max:255',
        'am_user' => 'required|string|max:255',
        'email' => 'required|email|max:255',
       'role' => 'required|string|exists:roles,name',
    ]);

    $user = User::findOrFail($id);
    $user->update([
        'name' => $request->name,
        'ap_user'=> $request->ap_user,
        'am_user' => $request->am_user,
        'email' =>$request->email,
        
    ]);
    $user->syncRoles($request->role);
    return redirect()->route('index-user')->with('success', 'Usuario actualizado correctamente');
}
public function delete($id){
    $user=User::findOrFail($id);
    $user->delete();
    return redirect()->route('index-user')->with('success','Usuario eliminado correctamente');

}
}
