<?php

namespace Database\Seeders;

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
        $topic = new Topic();
        $topic->course_id = '758432';
        $topic->rooms_id = 'seed001';
        $topic->title = 'Programming';
        $topic->description = 'Lorem ipsum dolor sit amet';
        $topic->deadline = '2021-10-10';
        $topic->value = '89';
        $topic->save();
    }
}
