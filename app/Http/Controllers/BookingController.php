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
    /**
     * Expressed in hours
     */
    private $slotDuration = 0.5;
    private $openHourOffice = 10;
    private $closeHourOffice = 18.5;

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

        $startTimeInSeconds = strtotime($request->bookingDate);
        $choosenServices = $request->servicesChoosen;

        // Etape 2 : Lien entre réservation et services et employés
        foreach ($choosenServices as $choosenService) {
            $service = Service::find($choosenService['id']);

            DB::table('booking_service')->insert([
                'booking_id' => $booking->id,
                'service_id' => $choosenService['id'],
                'employee_id' => $request->employee_id,
                // 'date' => $request->date . ' ' . $request->hour . ":" . $request->minute,
                'date' => date('Y-m-d H:i:s', $startTimeInSeconds),
                'time' => $request->hour . ":" . $request->minute // Obsolete/Deprecated
            ]);

            $startTimeInSeconds += ($service->duration * 60);
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

    public function getAvailabilityWithoutPreference($date, $totalDuration){
        $users = User::where('is_employee', 1)->get();

        /**
         * {
         *   //heure,emplyee ids
         *   "10": [1,2,3]
         *   "10.5": [1,2,3]
         *   "11": [1,2,3]
         * }
         */
        $freeSlots = [];
        // $debug = [];

        foreach($users as $user){
            $occupedSlots = $this->getBookingServicesAt($date, $user->id);
            $employeeFreeSlots = $this->getFreeSlots($occupedSlots, $totalDuration);
            $employeeEligibleSlots = $this->getEligibleStartSlots($employeeFreeSlots, $totalDuration);
            // $debug[$user->id] = $employeeFreeSlots;

            foreach ($employeeEligibleSlots as $employeeEligibleSlot){
                $key = number_format($employeeEligibleSlot, 1);

                if (isset($freeSlots[$key])) {
                    $freeSlots[$key][] = $user->id;
                } else {
                    $freeSlots[$key] = [$user->id];
                }
            }
        }

        // Shuffle everything, using reference inside the foreach
        foreach($freeSlots as &$freeSlot){
            shuffle($freeSlot);
        }

        return [
            'freeSlots' => $freeSlots,
            'eligibleStartSlots' => $freeSlots,
        ];
    }

    public function getBookingServicesAt($date, $employee_id) {
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

        return $occupedSlots;
    }

    public function getFreeSlots($bookingServices){
        $data = [];

        $occupiedSlots = [];
        // Computes slots that are occupied
        foreach ($bookingServices as $bookingService) {
            $date = DateTime::createFromFormat('Y-m-d H:i:s', $bookingService->dateStart);
            $hour = $date->format('H');
            $minute = $date->format("i");
            $hourMinute = $hour + ($minute / 60);

            // Add first slot
            if (!in_array($hourMinute, $occupiedSlots)) {
                $occupiedSlots[] = $hourMinute;
            }

            $endSlot = $hourMinute + ($bookingService->duration / 60);

            for ($j = $hourMinute; $j < $endSlot; $j = $j + $this->slotDuration) {
                if (!in_array($j, $occupiedSlots)) {
                    $occupiedSlots[] = $j;
                }
            }
        }

        // Create an array of the free slots
        $freeSlots = [];
        for ($i = $this->openHourOffice; $i < $this->closeHourOffice; $i = $i + $this->slotDuration) {
            if (!in_array($i, $occupiedSlots)) {
                $freeSlots[] = $i;
            }
        }

        return $freeSlots;
    }

    public function getSuite($freeSlots, $currentIndex, $count) {
        $currentIndex++;
        $count++;
        if (isset($freeSlots[$currentIndex])) {
            return $this->getSuite($freeSlots, $currentIndex, $count);
        }

        return $count;
    }

    public function getEligibleStartSlots($freeSlots, $duration) {
        $numberOfSlots = $duration / 60 / $this->slotDuration; // 4
        $data = [];

        foreach($freeSlots as $index => $freeSlot) {
            $folowingSlots = $this->getSuite($freeSlots, $index, 0);

            if ($numberOfSlots <= $folowingSlots) {
                $data[] = $freeSlot;
            }
        }

        return $data;
    }

    public function availability(Request $request)
    {
        $date = $request->input('date'); // Format YYYY-MM-DD
        $employee_id = $request->input('employee_id'); // Interger (0-Infinity)
        $totalDuration = $request->input('duration'); // Interger (0-Infinity)

        if ($totalDuration == 0) {
            return response()->json([]);
        }

        if (empty($date) || is_int($employee_id)) {
            throw new \Exception("Les paramètres 'date' et 'employee_id' doivent être fourni.");
        }

        if ($employee_id == 0 || $employee_id == '0') {
            return response()->json($this->getAvailabilityWithoutPreference($date, $totalDuration));
        }

        $occupedSlots = $this->getBookingServicesAt($date, $employee_id);
        $freeSlots = $this->getFreeSlots($occupedSlots);
        $data = $this->getEligibleStartSlots($freeSlots, $totalDuration);
        return response()->json([
            'occupedSlots' => $occupedSlots,
            'freeSlots' => $freeSlots,
            'eligibleStartSlots' => $data,
        ]);
    }
}
