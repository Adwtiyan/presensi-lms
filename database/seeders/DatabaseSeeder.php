<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Batch::factory(10)->create();
        \App\Models\Course::factory(10)->create();
        // \App\Models\Classrooms::factory(10)->create();
        $this->call([
            TopicSeeder::class,
            ClassroomSeeder::class,
            SchedulesSeeder::class,
            RoomsTableSeeder::class
        ]);
        $this->call([
            TopicTableSeeder::class
        ]);
    }
}
