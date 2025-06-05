<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request){
        $select=Product::select();
        if ($request->has('id_categories') && !empty($request->id_categories)) {
            $select->where('id_categories', $request->id_categories);
        }
        $products =$select->get(); 
        $categories=Categories::all();
        return view('managment_product.products.index-product', compact('products','categories')); 
    }
    
        /*public function index(){
            $products = Product::all(); 
            $categories=Categories::all();
            return view('managment_product.products.index-product', compact('products','categories')); 
        }*/
    public function create(){
        $categories = Categories::all(); // Obtener todas las categorías
        $suppliers = Supplier::all(); // Si también necesitas los proveedores
        return view('managment_product.products.create-product', compact('categories', 'suppliers'));
    }
   # public function create(){
    #    $categories = Categories::all(); // Obtener todas las categorías
    #$suppliers = Supplier::all(); // Si también necesitas los proveedores
    #}
    public function store(Request $request) {
        $request->validate([
            'id_categories' => 'required|integer|exists:categories,id',
            'name_product' => 'required|string|max:50',
            'id_supplier' => 'required|integer|exists:suppliers,id',
            'codeExt_product' => 'nullable|string|max:100',
            'codeInt_product' => 'nullable|string|max:100',
            'diameterMM_product' => 'nullable|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'diameterIN_product' => 'required|regex:#^\d+(\.\d+)?(/?\d+)?$#',
            'manufact_product' => 'nullable|string',
            'valueArt_product' => 'required|numeric|min:0',
            'image_product' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);
    
        // Guardar la imagen si existe
        $imagePath = $request->hasFile('image_product') 
            ? $request->file('image_product')->store('images', 'public') 
            : null;
    
        // Crear el producto
        Product::create([
            
            'id_categories' => $request->id_categories,
            'name_product' => $request->name_product,
            'id_supplier' => $request->id_supplier,
            'codeExt_product' => $request->codeExt_product,
            'codeInt_product' => $request->codeInt_product,
            'diameterMM_product' => $request->diameterMM_product,
            'diameterIN_product' => $request->diameterIN_product,
            'manufact_product' => $request->manufact_product,
            'valueArt_product' => $request->valueArt_product,
            'image_product' => $imagePath, // Guardamos la ruta de la imagen
        ]);
        

         return redirect()->route('index-product')->with('success', 'Producto creado exitosamente');

        }

public function edit($id)
{
    $products = Product::findOrFail($id); // Busca el proveedor por ID
    return view('managment_product.products.edit-product', compact('products')); // Carga la vista correcta
}
public function update(Request $request, $id)
{
    $request->validate([
    'name_product' => 'required|string|max:50',
    'codeExt_product' => 'nullable|string|max:100',
    'codeInt_product' => 'nullable|string|max:100',
    'diameterMM_product' => 'nullable|numeric|regex:/^\d+(\.\d{1,2})?$/',
    'diameterIN_product' => 'required|regex:#^\d+(\.\d+)?(/?\d+)?$#',
    'manufact_product' => 'nullable|string',
    'valueArt_product' => 'required|numeric|min:0',
    'image_product' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    ]);

 // Guardar la imagen si existe
        $imagePath = $request->hasFile('image_product') 
            ? $request->file('image_product')->store('images', 'public') 
            : null;

    $products = Product::findOrFail($id);
    $products->update([
        'name_product' => $request->name_product,
        'codeExt_product' => $request->codeExt_product,
        'codeInt_product' => $request->codeInt_product,
        'diameterMM_product' => $request->diameterMM_product,
        'diameterIN_product' => $request->diameterIN_product,
        'manufact_product' => $request->manufact_product,
        'valueArt_product' => $request->valueArt_product,
        'image_product' => $imagePath, // Guardamos la ruta de la imagen
    ]);

    return redirect()->route('index-product')->with('success', 'Producto actualizado correctamente');
  
}
public function delete($id){
    $products=Product::FindOrFail($id);
    $products->delete();
    
    return redirect()->route('index-product')->with('success','Producto eliminado correctamente');
    }
    }