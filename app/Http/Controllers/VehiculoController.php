<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    public function index(){
        return view('vehiculos.index-vehiculos');
    }
     public function create(){
        return view('vehiculos.create-vehiculos');
    }
}
