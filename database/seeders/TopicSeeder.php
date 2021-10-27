<?php

namespace Database\Seeders;

use App\Models\Batch;
use App\Models\User;
use App\Models\topic;
use App\Models\Course;
use App\Models\Classrooms;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory(1)->create();
        $course = new Course;
        $course->user_id = $user[0]->id;
        $course->course_title = 'Seeder Course Topic';
        $course->save();

        $batch = Batch::factory(1)->create();
        $classroom = new Classrooms;
        $classroom->batch_id = $batch[0]->id;
        $classroom->name = 'Seeder Classroom Topic';
        $classroom->save();

        $topic = new topic();
        $topic->course_id = $course->id;
        $topic->classroom_id = $classroom->id;
        $topic->title = 'Seeder Topic';
        $topic->deadline = '2021-10-19 22:55:30';
        $topic->description = 'Descriptions';
        $topic->total_point = 100;
        $topic->save();
    }
}
