<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Empleados;
use App\Models\Priority;
use App\Models\Project;
use App\Models\Client;
use App\Models\InstalationService;
use App\Models\User;
use App\Models\Company;
use App\Models\Product;
use App\Models\Recursos;
use App\Models\Status;
use App\Models\Supplier;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Token\Stack;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::all(); 
        return view('projects.index-project', compact('projects'));
    }
    public function create(){
        $projects = Project::all();
        $priorities=Priority::all();
        $clients=Client::all();
        $companies=Company::all();
        $users=User::all();
        $services=InstalationService::all();
        $statues=Status::all();
        $recursos=Recursos::all();
        $banks=Bank::all();
        $suppliers=Supplier::all();
        $products=Product::all();
        return view('projects.create-project', compact('priorities','users','clients','companies','services','statues','recursos','banks','suppliers','products'));

    }
}
