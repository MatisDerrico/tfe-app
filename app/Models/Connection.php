<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime:d/m/Y - h:i',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
