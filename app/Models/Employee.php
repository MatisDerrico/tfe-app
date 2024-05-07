<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    // pour ce model désactive la gestion des columns created_at, uptated_at
    public $timestamps = false;

    // Désactive la sécurité du mass asignment
    protected $guarded = [];

    // Un employé peut avoir plusieurs réservations
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    // Un service peut être réalisé par différents employés.

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function employeeBookings()
    {
        return $this->belongsToMany(Booking::class, 'booking_service', 'employee_id');
    }

}
