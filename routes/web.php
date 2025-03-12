<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AuthController;
Route::get('/', [AuthController::class,'index'])->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

#Las rutas que van para la parte de proveedor
Route::get('/index_Supplier',[SupplierController::class, 'index'])->name('index_Supplier');
Route::get('/create_supplier',[SupplierController::class, 'create'])->name('create_supplier');
Route::post('/create_supplier', [SupplierController::class, 'store'])->name('store_supplier');

Route::get('/index-client', function () {
    return view('client.index-client');
})->name('index-client');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
