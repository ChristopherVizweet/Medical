<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EntranceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Spatie\Permission\Middleware\RoleMiddleware;


Route::get('/', [AuthController::class,'index'])->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

#Las rutas que van para la parte de proveedor


Route::middleware(['auth'])->group(function () {
    Route::get('/index_Supplier', [SupplierController::class, 'index'])->name('index_Supplier');
    Route::get('/create_supplier', [SupplierController::class, 'create'])->name('create_supplier');
    Route::post('/create_supplier', [SupplierController::class, 'store'])->name('store_supplier');
    Route::get('/edit_supplier/{id}', [SupplierController::class, 'edit'])->name('edit_supplier');
    Route::put('/edit_supplier/{id}', [SupplierController::class, 'update'])->name('edit_supplier');
    Route::delete('/delete_supplier/{id}', [SupplierController::class, 'delete'])->name('delete_supplier');
});
#Las rutas que vna para la parte de cliente
Route::get('/index-client',[ClientController::class, 'index'])->name('index-client');
Route::get('/create-client',[ClientController::class, 'create'])->name('create-client');
Route::post('/create_client', [ClientController::class, 'store'])->name('store_client');
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
Route::get('/create-product',[ProductController::class, 'create'])->name('create-product');
Route::post('/create-product', [ProductController::class, 'store'])->name('store_product');
Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('edit-product');
Route::put('/edit-product/{id}', [ProductController::class, 'update'])->name('edit-product');
Route::delete('/delete-product/{id}',[ProductController::class, 'delete'])->name('delete-product');

#Parte para las ventas/cotizaciones/Entrada y salida de mercancia
Route::get('/index-entrance',[EntranceController::class,'index'])->name('index-entrance');
Route::get('/create-entrance',[EntranceController::class, 'create'])->name('create-entrance');



#Parte para la visualizacion y creacion de usuarios.
Route::get('/index-user',[UserController::class,'index'])->name('index-user');
Route::get('/create-user',[UserController::class, 'create'])->name('create-user');
Route::post('/create-user', [UserController::class, 'store'])->name('store-user');
Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('edit-user');
Route::put('/edit-user/{id}', [UserController::class, 'update'])->name('edit-user');
Route::delete('/delete-user/{id}',[UserController::class, 'delete'])->name('delete-user');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
