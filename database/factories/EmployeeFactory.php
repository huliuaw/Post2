<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
    
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->name().'@lycos.co.kr',
            'address' =>  Str::random(10).'@nate.com',
        ];
    }
}
