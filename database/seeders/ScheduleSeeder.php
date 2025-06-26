<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schedule::create([
            'film_id' => 1,
            'studio_id' => 1,
            'show_time' => Carbon::today()->addDays(1)->setHour(18)->setMinute(30),
            'price' => 50000,
        ]);
        Schedule::create([
            'film_id' => 1,
            'studio_id' => 2,
            'show_time' => Carbon::today()->addDays(1)->setHour(21)->setMinute(00),
            'price' => 50000,
        ]);
        
        // Jadwal untuk film 3 (Dark Knight)
        Schedule::create([
            'film_id' => 3,
            'studio_id' => 3,
            'show_time' => Carbon::today()->addDays(2)->setHour(19)->setMinute(00),
            'price' => 65000,
        ]);
    }
}
