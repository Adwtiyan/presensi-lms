<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Schedule;

class SchedulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schedule= new Schedule;
        $schedule->course_id = 64213;
        $schedule->classroom_id = 3214123;
        $schedule->room_id = 2312;
        $schedule->day = 'senin';
        $schedule->schedule_start = 'senin';
        $schedule->schedule_finish = 'selasa';
        $schedule->save();
    }
}
