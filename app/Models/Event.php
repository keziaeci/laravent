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

    protected $casts = [
        'is_active' => 'boolean'
    ];

    function bookings() {
        return $this->hasMany(EventBooking::class);
    }

}
