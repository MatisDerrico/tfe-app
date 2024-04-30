<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class EmployeeBookingController extends Controller
{
    public function index()
    {
        $employee = Auth::user(); // Récuperation des données de l'utilisateur connecté

        $employeeBookings = $employee->bookings; // Récupération des réservations rattachées à cet employé

        return Inertia::render('EmployeeBooking/index', [
            'employeeBookings' => $employeeBookings,
        ]);
    }
}
