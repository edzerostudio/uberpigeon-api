<?php

namespace Database\Factories;

use App\Models\Pigeon;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'distance' => $this->faker->randomNumber(),
            'deadline' => $this->faker->dateTime(),
            'cost' => $this->faker->randomNumber(),
            'pigeon_id' => Pigeon::factory(),
            'estimated_arrival' => $this->faker->dateTime(),
            'status' => $this->faker->randomElement(["Cancelled","Delivering","Delivered"]),
        ];
    }
}
