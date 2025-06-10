<?php

namespace App\Http\Controllers; 
use App\Models\Entrance;
use App\Models\Categories;
use App\Models\Product; 
use Illuminate\Http\Request;

class EntranceController extends Controller
{
    public function index(Request $request){
         $entrances=Entrance::all();
         return view('entrance.index-entrance', compact('entrances'));
     
    }
    
    public function create(){
        #return view('entrance.create-entrance');
        $categories = Categories::all(); // Obtener todas las categorías
        $products = Product::all(); // Si también necesitas los proveedores
        return view('entrance.create-entrance', compact('categories', 'products'));
    }
}
