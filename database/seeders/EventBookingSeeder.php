<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
use App\Models\EventBooking;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventBookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_id = User::first()->id;
        $event_id = Event::first()->id;

        EventBooking::create([
            'user_id'   => $user_id,
            'event_id'  => $event_id,
            'book_date' => Carbon::now(),
        ]);
    }
}
