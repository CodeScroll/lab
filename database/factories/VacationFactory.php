<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Vacation;
use Illuminate\Database\Eloquent\Factories\Factory;

class VacationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vacation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user =  \App\Models\User::factory(1)->create();
        return [
            'user_id' => User::all()->random()->id,
            'from' => $this->faker->dateTimeBetween('-1 years'),
            'to' => $this->faker->dateTimeBetween('-1 years'),
        ];
    }
}
