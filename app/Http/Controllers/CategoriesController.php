<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    
    public function index(){
        $categories = Categories::all(); 
        return view('managment_product.categories.index-categories', compact('categories'));
    }
    public function create(){
        return view('managment_product.categories.create-categories');
      }
    public function store(Request $request) {
        // Validar y guardar datos
        $request->validate([
            'name_categories' => 'required|string|max:15',
        ]);
    
        Categories::create([
            'name_categories' => $request->name_categories,
        ]);
        return redirect()->route('index-categories')->with('success', 'Categoria creada exitosamente');
}
public function edit($id)
{
    $categories = Categories::findOrFail($id); // Busca el proveedor por ID
    return view('managment_product.categories.edit-categories', compact('categories')); // Carga la vista correcta
}
public function update(Request $request, $id)
{
    $request->validate([
     'name_categories' => 'required|string|max:15',
    ]);

    $categories = Categories::findOrFail($id);
    $categories->update([
       'name_categories' => $request->name_categories,
    ]);

    return redirect()->route('index-categories')->with('success', 'Categoria actualizada correctamente');
}
public function delete($id){
    $categories=Categories::FindOrFail($id);
    $categories->delete();
    
    return redirect()->route('index-categories')->with('success','Categoria eliminada correctamente');
    }
}