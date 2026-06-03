<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotosVehiculosController extends Controller
{
    public function storePhotos(Request $request, $id)
    {
        $request->validate([
            'foto_frente' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
            'foto_lado_izquierdo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
            'foto_lado_derecho' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
            'foto_trasera' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
            'foto_adicional' => 'nullable|image|mimes:jpeg,png,jpg,gif|max|:5000',
        ]);
    }
    }