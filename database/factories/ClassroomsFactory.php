<?php

namespace Database\Factories;

use App\Models\Batch;
use App\Models\Batches;
use App\Models\Classrooms;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

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
        $batch = Batches::all('id')->random();
        return [
            'batch_id' => $batch,
            'name' => $this->faker->sentence()
        ];
    }
}
