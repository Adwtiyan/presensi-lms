<?php

namespace Database\Factories;

use App\Models\Classrooms;
use App\Models\Course;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Factories\Factory;

class TopicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Topic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
            $classroom = Classrooms::create([
                'name' => 'Seeder Classroom 1',
            ]);
            $course = Course::created([
                'name' => 'Seeder Course 1'
            ]);
            // dd($batch->id);
            return [
                'course_id' => $course->id,
                'classroom_id' => $classroom->id,
                'name' => $this->faker->sentence()
            ];
    }
}
