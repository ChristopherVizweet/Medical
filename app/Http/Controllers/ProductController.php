<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Imports\ProductsImport;
use App\Models\Categories;
use App\Models\Empleados;
use App\Models\InventarioMovimiento;
use App\Models\MovementProduct;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use phpDocumentor\Reflection\Types\Nullable;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

use function Pest\Laravel\get;

class ProductController extends Controller
{
    public function index(Request $request)
{
    $productQuery = Product::with('categories');

    if ($request->filled('id_categories')) {
        $productQuery->where('id_categories', $request->id_categories);
    }

    $products = $productQuery->get();
    $product=Product::all();
    
    $categories = Categories::all();

    return view('managment_product.products.index-product', compact('products', 'categories'));
}
    public function create(){
        //$categories = Categories::all(); // Obtener todas las categorías
        //$suppliers = Supplier::all(); // Si también necesitas los proveedores
        return view('managment_product.products.import-product');
    }
   # public function create(){
    #    $categories = Categories::all(); // Obtener todas las categorías
    #$suppliers = Supplier::all(); // Si también necesitas los proveedores
    #}
    public function store(Request $request) {
        $file=$request->file('import_file');
        Excel::import(new ProductsImport, $file);
        return redirect()->route('index-product')->with('success', 'Productos importados exitosamente');
        /*$request->validate([
            'id_categories' => 'required|integer|exists:categories,id',
            'name_product' => 'required|string|max:50',
            'id_supplier' => 'nullable|integer|exists:suppliers,id',
            'codeExt_product' => 'nullable|string|max:100',
            'codeInt_product' => 'nullable|string|max:100',
            'diameterMM_product' => 'nullable|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'diameterIN_product' => 'nullable|regex:#^\d+(\.\d+)?(/?\d+)?$#',
            'diameter_nominal' => 'nullable|string|max:255',
            'diameter_exterior' => 'nullable|string|max:255',
            'manufact_product' => 'nullable|string',
            'valueArt_product' => 'nullable|numeric|min:0',
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
        

         return redirect()->route('index-product')->with('success', 'Producto creado exitosamente');*/

        }

//Aqui esta la opcion para registrar uno por uno.

public function create1(){
$categories = Categories::all(); // Obtener todas las categorías
$suppliers = Supplier::all(); // Si también necesitas los proveedores
    return view('managment_product.products.create-product', compact('categories', 'suppliers'));
}
public function store1(Request $request){
    $request->validate([
            'id_categories' => 'required|integer|exists:categories,id',
            'name_product' => 'required|string|max:255',
            'id_supplier' => 'nullable|integer|exists:suppliers,id',
            'codeExt_product' => 'nullable|string|max:100',
            'codeInt_product' => 'nullable|string|max:100',
            'diameterMM_product' => 'nullable|string|max:255',
            'diameterIN_product' => 'nullable|regex:#^\d+(\.\d+)?(/?\d+)?$#',
            'diameter_nominal' => 'nullable|string|max:255',
            'diameter_exterior' => 'nullable|string|max:255',
            'manufact_product' => 'nullable|string',
            'valueArt_product' => 'nullable|numeric|min:0',
            'image_product' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'stock' =>'nullable|integer'
        ]);
    
        // Guardar la imagen si existe
        $imagePath = $request->hasFile('image_product') 
            ? $request->file('image_product')->store('productos', 'public') 
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
            'stock' =>$request->stock,
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
    'name_product' => 'required|string|max:255',
    'codeExt_product' => 'nullable|string|max:100',
    'codeInt_product' => 'nullable|string|max:100',
    'diameterMM_product' => 'nullable|numeric|regex:/^\d+(\.\d{1,2})?$/',
    'diameterIN_product' => 'nullable|regex:#^\d+(\.\d+)?(/?\d+)?$#',
    'manufact_product' => 'nullable|string',
    'valueArt_product' => 'nullable|numeric|min:0',
    'image_product' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    'stock' =>'nullable|integer'
    ]);

 // Guardar la imagen si existe
        $imagePath = $request->hasFile('image_product') 
            ? $request->file('image_product')->store('productos', 'public') 
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
        'stock' =>$request->stock,
    ]);

    return redirect()->route('index-product')->with('success', 'Producto actualizado correctamente');
  
}
public function delete($id){
    $products=Product::FindOrFail($id);
     if($products->projectProduct()->exists()){
      return redirect()->back()->with('error', 'No se puede eliminar el producto porque está asociado a proveedores en proyectos.');   
    }
    $products->delete();
    
    return redirect()->route('index-product')->with('success','Producto eliminado correctamente');
    }

    //Funcion para la entrada de productos
    public function indexExistencias(Request $request){
     /*$productQuery = Product::with('categories');

    /if ($request->filled('id_categories')) {
        $productQuery->where('id_categories', $request->id_categories);
    }

    $products = $productQuery->get();*/
        $products = Product::all();
        $categories = Categories::all();
    return view('entrance.index-existencias',compact('products','categories'));    
}
    public function indexEntradas() {
       $movimientos = InventarioMovimiento::with(['productos.product','recibe','firma',
       'proveedor','productos','product'])
                    ->where('tipoMovimiento', 'entrada')
                    ->orderBy('fecha_movimiento', 'desc')
                    ->get();
       $materiales = Product::all();
        return view('entrance.index-entradas',compact('movimientos','materiales'));
    }

    //Aqui comienzan las funciones para el registro de entradas
    public function createEntradas(){
        $materiales=Product::all();
        $suppliers=Supplier::all();
        $empleados=Empleados::all();
        $movimientos=InventarioMovimiento::all();
        $productos=InventarioMovimiento::all();
        return view('entrance.create-entradas',compact('materiales','suppliers','empleados','movimientos','productos'));
    }
    public function storeEntradas(Request $request)
{
    // 1. Validar
    $validated = $request->validate([
        'tipoMovimiento'            => 'required|in:entrada,salida',
        'codigo_movimiento'         => 'nullable|string',
      
        'cantidad_movimiento'       => 'nullable|integer|min:1',
        'supplier_id'               => 'nullable|exists:suppliers,id',
        'numero_factura_movimiento' => 'nullable|integer',
        'costos_movimiento'         => 'nullable|numeric',
        'fecha_movimiento'          => 'nullable|date',
        'recibe_id'                 => 'nullable|exists:empleados,id',
        'firma_id'                  => 'nullable|exists:empleados,id',
        'observaciones_movimiento'  => 'nullable|string',
       

        'productos'                 => 'required|array|min:1',
        'productos.*.product_id'    => 'required|exists:products,id',
        'productos.*.cantidad'      => 'required|integer|min:1',
        'productos.*.costo_unitario'=> 'nullable|numeric|min:0',
        'productos.*.codigo'        => 'nullable|string',

    ]);
$ultimaFactura=InventarioMovimiento::max('numero_factura_movimiento');
$nuevaFactura=$ultimaFactura ? $ultimaFactura + 1 : 1;

    // 2. Crear el movimiento principal
    $movimiento = InventarioMovimiento::create([
        'tipoMovimiento'            => $validated['tipoMovimiento'],
        'supplier_id'               => $validated['supplier_id'] ?? null,
        'numero_factura_movimiento' => $nuevaFactura ?? null,
        'fecha_movimiento'          => $validated['fecha_movimiento'] ?? now(),
        'recibe_id'                 => $validated['recibe_id'] ?? null,
        'firma_id'                  => $validated['firma_id'] ?? null,
        'observaciones_movimiento'  => $validated['observaciones_movimiento'] ?? null,

    ]);

    // 3. Registrar productos del movimiento y actualizar stock
    foreach ($validated['productos'] as $producto) {
        // Guardar en tabla pivot
        MovementProduct::create([
            'inventario_movimientos_id' => $movimiento->id,
            'product_id'               => $producto['product_id'],
            'cantidad'                 => $producto['cantidad'],
            'costo_unitario'           => $producto['costo_unitario'] ?? null,
            'codigo'                   => $producto['codigo'] ?? null,

            
        ]);

        // Ajustar stock producto por producto
        $product = Product::findOrFail($producto['product_id']);
        if ($validated['tipoMovimiento'] === 'entrada') {
            $product->stock += $producto['cantidad'];
        } elseif ($validated['tipoMovimiento'] === 'salida') {
            if ($product->stock < $producto['cantidad']) {
                return back()->withErrors([
                    'cantidad' => "No hay suficiente stock para el producto {$product->name_product}."
                ]);
            }
            $product->stock -= $producto['cantidad'];
        }
        $product->save();
    }

    return redirect()->route('index-entradas')->with('success', 'Registrado correctamente');
   
}

//Aqui van para las funciones para las salidas

public function indexSalidas(Request $request){
    $query = InventarioMovimiento::with(['productos.product','recibe','firma','productos'])
                    ->where('tipoMovimiento', 'salida')
                    ->orderBy('fecha_movimiento','desc');

    if($request->filled('obra_movimiento')){
        $query->whereHas('productos', function($q) use ($request) {
            $q->where('obra_movimiento', $request->obra_movimiento);
        });
    }
    if($request->filled('folio_movimiento')){
        $query->whereHas('productos', function($q) use ($request) {
            $q->where('folio_movimiento', $request->folio_movimiento);
        });
    }
   
    $movimientos = $query->orderBy('fecha_movimiento', 'desc')->get();
    
    return view('entrance.index-salidas', compact('movimientos'));
}
public function createSalidas(){
    $empleados=Empleados::all();
    $productos=Product::all();

    return view('entrance.create-salidas', compact('empleados','productos'));
}
public function storeSalidas(Request $request){
 // 1. Validar
    $validated = $request->validate([
        'tipoMovimiento'            => 'required|in:entrada,salida',
        'fecha_movimiento'          => 'nullable|date',
        'observaciones_movimiento'  => 'nullable|string',
        'obra_movimiento'           => 'nullable|string',
        'empleado_id'               => 'nullable|exists:empleados,id',
        'folio_movimiento'          => 'nullable|integer',
       
        'productos.*.product_id'    => 'required|exists:products,id',
        'productos.*.cantidad'      => 'required|integer|min:1',
        'productos.*.cantidadR'     => 'nullable|integer',
        'productos.*.cantidadA'     => 'nullable|integer'
    ]);
$ultimoFolio=MovementProduct::max('folio_movimiento');
$nuevoFolio=$ultimoFolio ? $ultimoFolio + 1 : 1;

    // 2. Crear el movimiento principal
    $movimiento = InventarioMovimiento::create([
        'tipoMovimiento'            => $validated['tipoMovimiento'],
        'fecha_movimiento'          => $validated['fecha_movimiento'] ?? now(),
        'observaciones_movimiento'  => $validated['observaciones_movimiento'] ?? null,
        'obra_movimiento'           => $validated['obra_movimiento'] ?? null,
        'empleado_id'               => $validated['empleado_id'] ?? null,

        'folio_movimiento'          => $nuevoFolio ?? null
    ]);

    // 3. Registrar productos del movimiento y actualizar stock
    foreach ($validated['productos'] as $producto) {
        // Guardar en tabla pivot
        MovementProduct::create([
            'inventario_movimientos_id'=> $movimiento->id,
            'product_id'               => $producto['product_id'],
            'cantidad'                 => $producto['cantidad'],
            'cantidadR'                => $producto['cantidadR'] ?? null,
            'cantidadA'                => $producto['cantidadA'] ?? null,
            'empleado_id'              => $validated['empleado_id'] ?? null,
            
            'folio_movimiento'         => $nuevoFolio ?? null,
            'obra_movimiento'          => $validated['obra_movimiento'] ?? null,
        ]);

        // Ajustar stock producto por producto
        $product = Product::findOrFail($producto['product_id']);
        if ($validated['tipoMovimiento'] === 'entrada') {
            $product->stock += $producto['cantidad'];
        } elseif ($validated['tipoMovimiento'] === 'salida') {
            if ($product->stock < $producto['cantidad']) {
                return back()->withErrors([
                    'cantidad' => "No hay suficiente stock para el producto {$product->name_product}."
                ]);
            }
            $product->stock -= $producto['cantidad'];
        }
        $product->save();
    }

    return redirect()->route('index-salidas')->with('success', 'Registrado correctamente');
   
}
public function createSalidasObras(){
    $empleados=Empleados::all();
    $productos=Product::all();

    return view('entrance.create-salidasObras', compact('empleados','productos'));
}
public function storeSalidasObras(Request $request){
 // 1. Validar
    $validated = $request->validate([
       'tipoMovimiento'            => 'required|in:entrada,salida',
        'fecha_movimiento'          => 'nullable|date',
        'observaciones_movimiento'  => 'nullable|string',
        'obra_movimiento'           => 'nullable|string',
        'empleado_id'               => 'nullable|exists:empleados,id',
        'encargado_almacen'        => 'nullable|exists:empleados,id',
        'encargado_envio'         => 'nullable|exists:empleados,id',
        'encargado_recibe'       => 'nullable|exists:empleados,id',
        'folio_movimiento'          => 'nullable|integer',
       
        'productos.*.product_id'    => 'required|exists:products,id',
        'productos.*.cantidad'      => 'required|integer|min:1',
        'productos.*.cantidadE'     => 'nullable|integer',
        'productos.*.cantidadR'     => 'nullable|integer',
        'productos.*.cantidadA'     => 'nullable|integer'
    ]);
$ultimoFolio=MovementProduct::max('folio_movimiento');
$nuevoFolio=$ultimoFolio ? $ultimoFolio + 1 : 1;
    // 2. Crear el movimiento principal
    $movimiento = InventarioMovimiento::create([
       'tipoMovimiento'            => $validated['tipoMovimiento'],
        'fecha_movimiento'          => $validated['fecha_movimiento'] ?? now(),
        'observaciones_movimiento'  => $validated['observaciones_movimiento'] ?? null,
        'obra_movimiento'           => $validated['obra_movimiento'] ?? null,
        'empleado_id'               => $validated['empleado_id'] ?? null,
        'encargado_almacen'        => $validated['encargado_almacen'] ?? null,
        'encargado_envio'         => $validated['encargado_envio'] ?? null,
        'encargado_recibe'       => $validated['encargado_recibe'] ?? null,
        'folio_movimiento'          => $nuevoFolio ?? null
    ]);

    // 3. Registrar productos del movimiento y actualizar stock
    foreach ($validated['productos'] as $producto) {
        // Guardar en tabla pivot
        MovementProduct::create([
           'inventario_movimientos_id'=> $movimiento->id,
            'product_id'               => $producto['product_id'],
            'cantidad'                 => $producto['cantidad'],
            'cantidadE'                => $producto['cantidadE'] ?? null,
            'cantidadR'                => $producto['cantidadR'] ?? null,
            'cantidadA'                => $producto['cantidadA'] ?? null,
            'empleado_id'              => $validated['empleado_id'] ?? null,
            'encargado_almacen'        => $validated['encargado_almacen'] ?? null,
            'encargado_envio'         => $validated['encargado_envio'] ?? null,
            'encargado_recibe'       => $validated['encargado_recibe'] ?? null,
            'folio_movimiento'         => $nuevoFolio ?? null,
            'obra_movimiento'          => $validated['obra_movimiento'] ?? null,
        ]);

        // Ajustar stock producto por producto
        $product = Product::findOrFail($producto['product_id']);
        if ($validated['tipoMovimiento'] === 'entrada') {
            $product->stock += $producto['cantidad'];
        } elseif ($validated['tipoMovimiento'] === 'salida') {
            if ($product->stock < $producto['cantidad']) {
                return back()->withErrors([
                    'cantidad' => "No hay suficiente stock para el producto {$product->name_product}."
                ]);
            }
            $product->stock -= $producto['cantidad'];
        }
        $product->save();
    }

    return redirect()->route('index-salidas')->with('success', 'Registrado correctamente');
   
}
//Funcion para convertir a PDF
public function print($id)
{
    
    $movimientos = InventarioMovimiento::with(['productos','product','obra','productos.empleado'])->findOrFail($id);

    $pdf = Pdf::loadView('entrance.pdf-salidas', compact('movimientos'));

    return $pdf->stream('Vale_salida_'.$id.'.pdf');
}
public function printObra($id)
{
    $movimientos = InventarioMovimiento::with(['productos','product','obra','productos.empleado',
    'productos.encargadoA','productos.encargadoE','productos.encargadoR'])->findOrFail($id);
    $pdf = Pdf::loadView('entrance.pdf-salidasObras', compact('movimientos'));
    return $pdf->stream('Vale_salida_Obra_'.$id.'.pdf');
}

public function deleteMovements($id){
    $movimiento=InventarioMovimiento::findOrFail($id);
    
    $movimiento->delete();
    return redirect()->route('index-entradas')->with('success','Entrada eliminada correctamente');

}
public function deleteM($id){
    $movi=InventarioMovimiento::findOrFail($id);
   
    $movi->delete();
    return redirect()->route('index-salidas')->with('success','Salida eliminada correctamente');

}
}