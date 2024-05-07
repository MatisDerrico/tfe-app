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

        $bookings = $employee->employeeBookings; // Récupération des réservations rattachées à cet employé

        dd($bookings);

        return Inertia::render('EmployeeBooking/index', [
            'bookings' => $bookings,
        ]);
    }
}
