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

        $employees = Employee::with('bookings')->get();


        return Inertia::render('Employees/index', [
            'employees' => $employees,
        ]);
    }
}
