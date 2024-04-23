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
        // Création d'employés
        $employe = Employee::create([
            'name'=>$request->name,
            'type'=>$request->type
        ]);

        // Association des services à cet employé

        $employe->services()->attach($request->services);

    }

    // On injecte une instance du modèle Employee grâce aux routes model binding

    public function edit(Employee $employe)
    {
        return Inertia::render('Employees/edit',['employee' => $employe]);
    }

}
