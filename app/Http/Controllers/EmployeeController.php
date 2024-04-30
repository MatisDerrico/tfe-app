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
        // Récupération des connections avec les données des utilisateurs
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
            'name' => $request->name,
            'type' => $request->type
        ]);

        // Association des services à cet employé
        $employe->services()->attach($request->services);
    }

    public function edit(Request $request)
    {
        $employe = Employee::find($request->employe);

        $services = Service::where('type', $employe->type)->get();

        $employeeServicesProvided = $employe->services->pluck('id');

        return Inertia::render('Employees/edit',[
            'employee' => $employe,
            'services' => $services,
            'providedServices' => $employeeServicesProvided
        ]);
    }

    public function update(Request $request)
    {
        $employe = Employee::find($request->employe);

        // Supprimer la liste des services de cet employé
        $employe->services()->detach();

        // Attribuer les nouveaux services sélectionnés à cet employé
        $employe->services()->attach($request->services);

        $employe->update([
            'name' => $request->name,
            'type' => $request->type
        ]);
    }

    public function destroy(Request $request)
    {
        $employee = Employee::find($request->employe);

        // Supprimer la liste des services de cet employé
        $employee->services()->detach();

        $employee->delete();
    }
}
