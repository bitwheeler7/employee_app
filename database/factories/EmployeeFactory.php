<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\State;
use App\Models\City;

/**
 * @extends Factory<Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $state = State::inRandomOrder()->first();
        $city = City::where('state_id', $state->id)->inRandomOrder()->first();
        return [
            'name'=>$this->faker->name(),
            'email'=>$this->faker->unique()->safeEmail(),
            'phone'=>$this->faker->phoneNumber(),
            'salary'=>$this->faker->numberBetween(10000,50000),
            'state_id' => $state->id,   
            'city_id' => $city->id ,
        ];
    }
}
