<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y - h:i',
    ];

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

    // On fait appel à la relation services en lui incluant une méthode sum qui permettra de calculer le cout de tous les services
    public function servicesTotalCost()
    {
        // return $this->services()->sum('price');
        return $this->belongsToMany(Service::class)->sum('price');
    }

    public function bookingsEmployee()
    {
        return $this->belongsToMany(Employee::class);
    }

}
