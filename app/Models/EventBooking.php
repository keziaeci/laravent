<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventBooking extends Model
{
    protected $fillable = [
        'user_id',
        'event_id',
        'book_date'
    ];

    function user() {
        return $this->belongsTo(User::class);
    }

    function event() {
        return $this->belongsTo(Event::class);
    }
}
