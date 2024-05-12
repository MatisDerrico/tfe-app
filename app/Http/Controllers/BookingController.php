<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Mail\BookingConfirmation;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Booking;
use App\Models\Service;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function index()
    {
        /**
         * Permet de charger le contenu de la table booking en incluant les données du model user associé
         * Grâce à la relation défini dans le model booking
         */
        $bookings = Booking::with(['services'])->get();
        
        //  dd($bookings);

        return Inertia::render('Bookings/index', [
            'bookings' => $bookings,
        ]);
    }

    public function create()
    {
        $services = Service::all();
        $employees = User::where('is_employee', true)->get();

        return Inertia::render('Bookings/create', [
            'services' => $services,
            'employees' => $employees,
        ]);
    }

    public function store(StoreBookingRequest $request)
    {
        // return $request->all();

        // Etape 1 : création de la réservation

        $booking = Booking::create([
            'name' => $request->name,
            'email' => $request->email,
            'price' => $request->price,
            'date' => $request->date,
            'time' => $request->time,
        ]);

        // Etape 2 : Lien entre réservation et services et employés
        foreach($request->servicesChoosen as $service) {
            DB::table('booking_service')->insert([
                'booking_id' => $booking->id,
                'service_id' => $service['id'],
                'employee_id' => $service['employee_id']
            ]);
        }

        // Etape 3 : envoi du mail de confirmation
        Mail::to($request->email)->send(new BookingConfirmation());

        return to_route('booking.confirmation');
    }

    public function confirmation()
    {
        return Inertia::render('Bookings/confirmation');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return to_route('booking.index');
    }
}
