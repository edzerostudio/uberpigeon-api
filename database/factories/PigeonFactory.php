<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PigeonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            'speed' => $this->faker->randomNumber(2),
            'range' => $this->faker->randomNumber(3),
            'cost' => 2,
            'downtime' => $this->faker->randomDigit(),
            'uptime' => $this->faker->dateTime(),
            'status' => $this->faker->randomElement(["Cancelled","Delivering","Delivered"]),
        ];
    }
}
