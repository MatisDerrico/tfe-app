<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    // pour ce model désactive la gestion des columns created_at, uptated_at
    public $timestamps = false;

     // Un service est lié à plusieurs réservations
     public function bookings()
     {
         return $this->belongsToMany(Booking::class);
     }

     // Un employé peut réalisé plusieurs services

     public function employee()
     {
         return $this->belongsToMany(Employee::class);
     }
}
