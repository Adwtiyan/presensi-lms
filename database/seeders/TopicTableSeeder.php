<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\User;
use App\Models\Topic;
use App\Models\Course;
use Illuminate\Database\Seeder;

class TopicTableSeeder extends Seeder
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
        $course->course_title = 'Seeder Course Schedule';
        $course->save();

        $topic = new Topic();
        $topic->course_id = $course->id;
        $topic->title = 'Programming';
        $topic->description = 'Lorem ipsum dolor sit amet';
        $topic->deadline = '2021-10-10';
        $topic->value = '89';
        $topic->save();
    }
}
