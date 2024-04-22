<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Service;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmployeeController extends Controller
{
    public function index ()
    {
        // Récupération de toutes les connections brutes
        // $connections = Connection::all();

        // Récuparation des connections avec les données des utilisateurs

        $employees = Employee::with('services')->get();


        return Inertia::render('Employees/index', [
            'employees' => $employees,
        ]);
    }

    public function create()
    {
        $services = Service::all();

        return Inertia::render('Employees/create', ['services' => $services]);
    }

    public function store(Request $request)
    {
        Employee::create([
            'name'=>$request->name,
            'type'=>$request->type
        ]);
    }

}
