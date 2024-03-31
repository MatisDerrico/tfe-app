<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    // pour ce model désactive la gestion des columns created_at, uptated_at
    public $timestamps = false;

    // Un employé peut avoir plusieurs réservations
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
