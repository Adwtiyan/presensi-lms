<?php

namespace Database\Factories;

use App\Models\Batch;
use App\Models\Classrooms;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClassroomsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Classrooms::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $batch = Batch::all('id')->random();
        return [
            'batch_id' => $batch,
            'name' => $this->faker->sentence()
        ];
    }
}
