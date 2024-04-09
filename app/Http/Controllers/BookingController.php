<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class BookingController extends Controller
{
    public function index()
    {
        /** Permet de charger le contenu de la table booking en incluant les données du model user associé
         * Grâce à la relation défini dans le model booking
         */



        $bookings = Booking::with(['user','services.employee',])

        /**
         * Grâce à la méthode withcount, elle permet de compter l'ensemble des services liés à la réservation et le query->select qui est une fonction callback permet de calculer le total des services trouvés.
        */

        ->withCount(['services as total' => function($query){
            $query->select(DB::raw('SUM(price)'));
        }])
        ->get();
        //  dd($bookings);

        return Inertia::render('Bookings/index', [
            'bookings' => $bookings,
        ]);




    }
}
