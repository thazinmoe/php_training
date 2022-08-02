<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fname' => $this->faker->sentence,
            'lname' => $this->faker->sentence,
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
            'category' => $this->faker->sentence,           
            ];
    }
}
