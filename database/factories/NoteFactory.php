<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'title' => Str::random(10).'@gmail.com',
            'email' => $this->faker->unique()->safeEmail(),
            //email : 랜덤한 이메일을 생성합니다.
        ];
    }
}
