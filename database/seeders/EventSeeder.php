<?php

namespace Database\Seeders;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::create([
            'name'        => 'Event 1',
            'description' => 'description',
            'location'    => 'Jl. Jalanin Aja Dulu',
            'is_active'   => true,
            'date_time'   => Carbon::now()
        ]);
    }
}
