<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'name' => $this->faker->sentence,
            'email' => $this->faker->paragraph,
            //'email' => $this->Str::random(10).'@gmail.com',
            'major_id' => rand(1, 2),
            'course' => $this->faker->sentence,
            'address' => $this->faker->sentence,
            ];
    }
}
