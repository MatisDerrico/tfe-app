<?php

namespace App\Http\Controllers;

use App\Models\Employee;
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
        return Inertia::render('Employees/create');
    }

    public function store(Request $request)
    {
        Employee::create([
            'name'=>$request->name,
            'type'=>$request->type
        ]);
    }

}
