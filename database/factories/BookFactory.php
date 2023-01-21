<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->title(),
            'author_name' => $this->faker->paragraph(),
            'price' => rand(0,1) ? rand(0,100) : 0.00,
            'image' => $this->faker->imageUrl(),
        ];
    }
}
