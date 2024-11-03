<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'description',
        'location',
        'is_active',
        'date_time',
    ];

    function bookings() {
        return $this->hasMany(EventBooking::class);
    }

}
