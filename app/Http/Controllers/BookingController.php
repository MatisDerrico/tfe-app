<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Mail\BookingConfirmation;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Booking;
use App\Models\Service;
use App\Models\Employee;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use stdClass;

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

        // Etape 1 : création de la réservation

        $booking = Booking::create([
            'name' => $request->name,
            'email' => $request->email,
            'price' => $request->price
        ]);

        // Etape 2 : Lien entre réservation et services et employés
        foreach ($request->servicesChoosen as $service) {
            DB::table('booking_service')->insert([
                'booking_id' => $booking->id,
                'service_id' => $service['id'],
                'employee_id' => $request->employee_id,
                'date' => $request->date . ' ' . $request->hour . ":" . $request->minute,
                'time' => $request->hour . ":" . $request->minute
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

    public function availability(Request $request)
    {
        $slotDuration = 0.5; // heure
        $openHourOffice = 10;
        $closeHourOffice = 18.5;

        $date = $request->input('date');
        $employee_id = $request->input('employee_id');
        $dateStart = "$date 00:00";
        $dateStop = "$date 23:59";
        $scheduledServices = Booking::withWhereHas('services', function ($query) use ($dateStart, $dateStop, $employee_id) {
            return $query->where('booking_service.date', '>', $dateStart)->where('booking_service.date', '<=', $dateStop)->where('booking_service.employee_id', $employee_id);
        })->get();

        $occupedSlots = [];
        foreach ($scheduledServices as $scheduledService) {
            foreach ($scheduledService->services as $service) {
                $obj = new stdClass();
                $obj->dateStart = $service->pivot->date;
                $obj->duration = $service->duration;
                $occupedSlots[] = $obj;
            }
        }

        // return response()->json([
        //     $occupedSlot
        // ]);

        $data = [];

        for ($i = $openHourOffice; $i < $closeHourOffice; $i = $i + $slotDuration) {
            if(count($occupedSlots)==0){
                $data[] = $i;
            } else {
                foreach($occupedSlots as $occupedSlot){
                    $date = DateTime::createFromFormat('Y-m-d H:i:s', $occupedSlot->dateStart);
                    $hour = $date->format('H');
                    $minute = $date->format("i");
                    $hourMinute = $hour+($minute/60);


                    $endSlot = $hourMinute + ($occupedSlot->duration/60);
                    $inbetweenSlots = [];
                    for($j = $hourMinute; $j <$endSlot; $j = $j +$slotDuration){
                        $inbetweenSlots[] = $j;
                    }

                    if(in_array($i, $inbetweenSlots)){
                        continue;

                    }
                    else{
                        $data[] = $i;
                    }
                }
            }



        }
        return response()->json([
            $data
        ]);
    }
}
