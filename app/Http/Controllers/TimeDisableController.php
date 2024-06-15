<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TimeDisableController extends Controller
{
    public function __invoke(Request $request)
    {
        // Récupérer les heures des réservations deja prises pour une date choisie et un collaborateur choisi
        $timeDisabled = DB::table('booking_service')
            ->select('time')
            ->whereDate('date', $request->date)
            ->where('employee_id', $request->employee)
            ->get()
            ->pluck('time');


        $timeReduced = $timeDisabled->map(function (string $time) {
            return substr($time, 0, 2);
        });

        return $timeReduced;
    }
}
