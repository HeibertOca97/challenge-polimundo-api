<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'origin_city' => $this->faker->country(),
            'destiny_city' => $this->faker->country(),
            'departure_date_at' => $this->faker->date
        ];
    }
}
