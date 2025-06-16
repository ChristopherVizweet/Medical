<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use App\Models\Priority;
use App\Models\Project;
use App\Models\Client;
use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;

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
        return view('projects.create-project', compact('priorities','users','clients','companies'));

    }
}
