<?php

namespace Database\Seeders;

use App\Models\Batch;
use App\Models\Classrooms;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $batch = Batch::factory(1)->create();
        $classroom = new Classrooms;
        $classroom->batch_id = $batch[0]->id;
        $classroom->name = 'Seeder Classroom Batch 1';
        $classroom->save();
    }
}
