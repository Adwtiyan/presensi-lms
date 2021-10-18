<?php

namespace Database\Seeders;

use App\Models\Classrooms;
use App\Models\Course;
use App\Models\Room;
use Illuminate\Database\Seeder;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Batch;

class SchedulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory(1)->create();
        // dd($user[0]->id);

        $course = new Course;
        $course->user_id = $user[0]->id;
        $course->course_title = 'Seeder Course Schedule';
        $course->save();

        $batch = Batch::create([
            'name' => 'Seeder Schedule Batch 1'
        ]);

        $classroom = new Classrooms;
        $classroom->batch_id = $batch->id;
        $classroom->name = 'Seeder Classsroom Schedule';
        $classroom->save();

        $room = new Room;
        $room->room_code = 'Zoom Meeting Seeder Schedule';
        $room->save();

        $schedule = new Schedule;
        $schedule->course_id = $course->id;
        $schedule->classroom_id = $classroom->id;
        $schedule->room_id = $room->id;
        $schedule->day = 'senin';
        $schedule->schedule_start = '08:40:00';
        $schedule->schedule_finish = '11:00:00';
        $schedule->save();
    }
}
