<?php

namespace App\Http\Controllers;

use App\Models\Entrance;
use Illuminate\Http\Request;

class EntranceController extends Controller
{
    public function index(){
        $entrances=Entrance::all();
        return view('entrance.index-entrance', compact('entrances'));
    }
    public function create(){
        return view('entrance.create-entrance');
    }
}
