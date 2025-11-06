<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\EntranceController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\RecursosController;
use App\Models\Empleados;
use App\Models\Entrance;
use App\Models\Recursos;
use App\Models\InstalationService;
use App\Models\Product;
use Spatie\Permission\Middleware\RoleMiddleware;


Route::get('/', [DashboardController::class,'index'])->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
});

#Las rutas que van para la parte de proveedor


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::get('/index_Supplier', [SupplierController::class, 'index'])->name('index_Supplier');
    Route::get('/create_supplier', [SupplierController::class, 'create'])->name('create_supplier');
    Route::get('/import-supplier',[SupplierController::class, 'create1'])->name('import-supplier');
Route::post('/import-supplier', [SupplierController::class, 'store1'])->name('import-supplier');
    Route::post('/create_supplier', [SupplierController::class, 'store'])->name('store_supplier');
    Route::get('/edit_supplier/{id}', [SupplierController::class, 'edit'])->name('edit_supplier');
    Route::put('/edit_supplier/{id}', [SupplierController::class, 'update'])->name('edit_supplier');
    Route::delete('/delete_supplier/{id}', [SupplierController::class, 'delete'])->name('delete_supplier');
#});
#Las rutas que van para la parte de proveedores
Route::get('/import-supplier',[SupplierController::class, 'create1'])->name('import-supplier');
Route::post('/import-supplier', [SupplierController::class, 'store1'])->name('import-supplier');
#Las rutas que vna para la parte de cliente
Route::get('/index-client',[ClientController::class, 'index'])->name('index-client');
Route::get('/create-client',[ClientController::class, 'create'])->name('create-client');
Route::post('/create_client', [ClientController::class, 'store'])->name('store_client');
Route::get('/import-client',[ClientController::class, 'create1'])->name('import-client');
Route::post('/import-client', [ClientController::class, 'store1'])->name('import-client');
Route::get('/edit_client/{id}', [ClientController::class, 'edit'])->name('edit_client');
Route::put('/edit_client/{id}', [ClientController::class, 'update'])->name('edit_client');
Route::delete('/delete_client/{id}',[ClientController::class, 'delete'])->name('delete_client');
Route::resource('clients', ClientController::class);

#Para la parte de gestión de categorias/productos
Route::get('/index-managmentp',function(){
return view('managment_product.index-managmentp');
})->name('index-managmentp');
Route::get('/index-categories',[CategoriesController::class,'index'])->name('index-categories');
Route::get('/create-categories',[CategoriesController::class, 'create'])->name('create-categories');
Route::post('/create_categories', [CategoriesController::class, 'store'])->name('store_categories');
Route::get('/edit-categories/{id}', [CategoriesController::class, 'edit'])->name('edit-categories');
Route::put('/edit-categories/{id}', [CategoriesController::class, 'update'])->name('edit-categories');
Route::delete('/delete-categories/{id}',[CategoriesController::class, 'delete'])->name('delete-categories');
#PRODUCTOS
Route::get('/index-product',[ProductController::class,'index'])->name('index-product');
Route::get('/create-product',[ProductController::class, 'create1'])->name('create-product');
Route::post('/create-product',[ProductController::class, 'store1'])->name('store-product');
Route::get('/import-product',[ProductController::class, 'create'])->name('import-product');
Route::post('/import-product', [ProductController::class, 'store'])->name('store-product');
Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('edit-product');
Route::put('/edit-product/{id}', [ProductController::class, 'update'])->name('edit-product');
Route::delete('/delete-product/{id}',[ProductController::class, 'delete'])->name('delete-product');


#Parte para las ventas/cotizaciones/Entrada y salida de mercancia
Route::get('/index-existencias',[ProductController::class,'indexExistencias'])->name('index-existencias');
Route::get('/index-entradas',[ProductController::class, 'indexEntradas'])->name('index-entradas');
Route::get('/create-entradas',[ProductController::class, 'createEntradas'])->name('create-entradas');
Route::post('/create-entradas',[ProductController::class, 'storeEntradas'])->name('store-entradas');
Route::get('/index-salidas',[ProductController::class,'indexSalidas'])->name('index-salidas');
Route::get('/create-salidas',[ProductController::class, 'createSalidas'])->name('create-salidas');
Route::post('/create-salidas',[ProductController::class, 'storeSalidas'])->name('store-salidas');
Route::get('/create-salidasObras',[ProductController::class, 'createSalidasObras'])->name('create-salidasObras');
Route::post('/create-salidasObras',[ProductController::class, 'storeSalidasObras'])->name('store-salidasObras');
Route::delete('/delete-entradas/{id}',[ProductController::class, 'deleteMovements'])->name('delete-entradas');
Route::delete('/delete-salidas/{id}',[ProductController::class, 'deleteM'])->name('delete-salidas');
Route::get('/edit-salidas/{id}', [ProductController::class, 'editSalidas'])->name('edit-salidas');
Route::put('/edit-salidas/{id}', [ProductController::class, 'updateSalidas'])->name('edit-salidas');
//impresion de las entradas y salidas
Route::get('/pdf-salidasObras/{id}',[ProductController::class, 'printObra'])->name('pdf-salidasObras');
Route::get('/pdf-salidas/{id}',[ProductController::class, 'print'])->name('pdf-salidas');
//La exportacion de las entradas a excel
Route::get('/export-entradas',[ProductController::class, 'export'])->name('export-entradas');






#Parte para la visualizacion y creacion de usuarios.
Route::get('/index-user',[UserController::class,'index'])->name('index-user');
Route::get('/create-user',[UserController::class, 'create'])->name('create-user');
Route::post('/create-user', [UserController::class, 'store'])->name('store-user');
Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('edit-user');
Route::put('/edit-user/{id}', [UserController::class, 'update'])->name('edit-user');
Route::delete('/delete-user/{id}',[UserController::class, 'delete'])->name('delete-user');

#Parte para los empleados
Route::get('/index-employees',[EmpleadosController::class,'index'])->name('index-employees');
Route::get('/create-employees',[EmpleadosController::class,'create'])->name('create-employees');
Route::post('/create-employees', [EmpleadosController::class, 'store'])->name('store-employees');
#Route::get('/viewEmployees/{curp}',[EmpleadosController::class, 'view'/*Esto es como editar*/])->name('viewEmployees');
Route::get('/edit-employees/{id}',[EmpleadosController::class, 'edit'])->name('edit-employees');
Route::put('/edit-employees/{id}',[EmpleadosController::class, 'update'])->name('edit-employees');
Route::delete('/delete-employees/{id}',[EmpleadosController::class, 'delete'])->name('delete-employees');
Route::delete('/delete-certificados/{id}',[EmpleadosController::class, 'deleteCertificados'])->name('delete-certificados');

#Parte para el proyecto
Route::get('/index-project',[ProjectController::class,'index'])->name('index-project');
Route::get('/create-project',[ProjectController::class,'create'])->name('create-project');
Route::post('/create-project',[ProjectController::class,'store'])->name('store-project');
Route::get('/edit-project/{id}',[ProjectController::class, 'edit'])->name('edit-project');
Route::put('/edit-project/{id}',[ProjectController::class, 'update'])->name('edit-project');
Route::delete('/delete-project/{id}',[ProjectController::class, 'delete'])->name('delete-project');


#Parte de los servicios de instalación
Route::get('/index-service',[ServiceController::class,'index'])->name('index-service');
Route::get('/create-service',[ServiceController::class,'create'])->name('create-service');
Route::post('/create-service',[ServiceController::class,'store'])->name('store-service');
Route::get('/edit-service/{id}',[ServiceController::class, 'edit'])->name('edit-service');
Route::put('/edit-service/{id}',[ServiceController::class, 'update'])->name('edit-service');
Route::delete('/delete-service/{id}',[ServiceController::class, 'delete'])->name('delete-service');


#Parte de las prioridades
Route::get('/index-priority',[PriorityController::class,'index'])->name('index-priority');
Route::get('/create-priority',[PriorityController::class,'create'])->name('create-priority');
Route::post('/create-priority',[PriorityController::class,'store'])->name('store-priority');
Route::get('/edit-priority/{id}',[PriorityController::class, 'edit'])->name('edit-priority');
Route::put('/edit-priority/{id}',[PriorityController::class, 'update'])->name('edit-priority');
Route::delete('/delete-priority/{id}',[PriorityController::class, 'delete'])->name('delete-priority');


#Parte de status
Route::get('/index-status',[StatusController::class,'index'])->name('index-status');
Route::get('/create-status',[StatusController::class,'create'])->name('create-status');
Route::post('/create-status',[StatusController::class,'store'])->name('store-status');
Route::get('/edit-status/{id}',[StatusController::class, 'edit'])->name('edit-status');
Route::put('/edit-status/{id}',[StatusController::class, 'update'])->name('edit-status');
Route::delete('/delete-status/{id}',[StatusController::class, 'delete'])->name('delete-status');



#Parte de la empresa
Route::get('/index-company',[CompanyController::class,'index'])->name('index-company');
Route::get('/create-company',[CompanyController::class,'create'])->name('create-company');
Route::post('/create-company',[CompanyController::class,'store'])->name('store-company');
Route::get('/edit-company/{id}',[CompanyController::class, 'edit'])->name('edit-company');
Route::put('/edit-company/{id}',[CompanyController::class, 'update'])->name('edit-company');
Route::delete('/delete-company/{id}',[CompanyController::class, 'delete'])->name('delete-company');

#Parte de recursos
Route::get('/index-recursos',[RecursosController::class,'index'])->name('index-recursos');
Route::get('/create-recursos',[RecursosController::class,'create'])->name('create-recursos');
Route::post('/create-recursos',[RecursosController::class,'store'])->name('store-recursos');
Route::get('/edit-recursos/{id}',[RecursosController::class, 'edit'])->name('edit-recursos');
Route::put('/edit-recursos/{id}',[RecursosController::class, 'update'])->name('edit-recursos');
Route::delete('/delete-recursos/{id}',[RecursosController::class, 'delete'])->name('delete-recursos');

#Parte de cuenta bancaria
Route::get('/index-bank',[BankController::class,'index'])->name('index-bank');
Route::get('/create-bank',[BankController::class,'create'])->name('create-bank');
Route::post('/create-bank',[BankController::class,'store'])->name('store-bank');
Route::get('/edit-bank/{id}',[BankController::class, 'edit'])->name('edit-bank');
Route::put('/edit-bank/{id}',[BankController::class, 'update'])->name('edit-bank');
Route::delete('/delete-bank/{id}',[BankController::class, 'delete'])->name('delete-bank');


#Parte para la creacion de PDF
Route::get('/pdf-project/{id}',[ProjectController::class, 'print'])->name('pdf-project');



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
