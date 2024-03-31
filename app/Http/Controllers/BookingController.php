<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        /** Permet de charger le contenu de la table booking en incluant les données du model user associé
         * Grâce à la relation défini dans le model booking
         */

        $bookings = Booking::with('user')->get();
        //dd($bookings);
        return view('bookings.index', compact('bookings'));
    }
}
