<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->email(),
            // Valid international number
            'number' => fake()->e164PhoneNumber(),
            'country_id' => fake()->numberBetween(1, 128),
            'request_id' => fake()->numberBetween(1, 2),
            'service_id' => fake()->numberBetween(1, 4),
            'status_id' => fake()->numberBetween(1, 4),
            'message' => fake()->sentence()
        ];
    }
}
