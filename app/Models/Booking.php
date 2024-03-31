<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $dateFormat = 'd/m/y';

    // Une réservation est liée à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Une réservation est liée à un employé
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }


    // Une réservation est lié à plusieurs services
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

}
