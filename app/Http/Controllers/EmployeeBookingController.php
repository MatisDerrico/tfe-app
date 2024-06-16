<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeBookingController extends Controller
{
    public function index()
    {
        $employee = Auth::user(); // Récuperation des données de l'utilisateur connecté

         // Récupération des réservation avec les services associés
        $bookings = Booking::withWhereHas('services', function($query) use ($employee){
            return $query->where('booking_service.employee_id', $employee->id);
        })->get();

        return Inertia::render('EmployeeBooking/index', [
            'bookings' => $bookings,
        ]);
    }
}
