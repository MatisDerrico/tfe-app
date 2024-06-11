<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    use HasFactory;

    // pour ce model désactive la gestion des columns created_at, uptated_at
    public $timestamps = false;

    protected $guarded = [];

    protected $table = 'employee_holidays';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

