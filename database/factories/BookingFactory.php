<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Car;
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

            'start_date' => $this->faker->date,
            'end_date' => $this->faker->date,
            'passengers' => $this->faker->numberBetween(1, 5),
            'user_id' => $this->faker->randomElement(User::pluck('id')->toArray()),
            'car_id' => $this->faker->randomElement(Car::pluck('id')->toArray()),

        ];
    }
}
