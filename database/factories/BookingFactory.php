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
        $startDate = $this->faker->dateTimeBetween('-2 years', '+2 years');
        $endDate = (clone $startDate)->modify('+1 month');

        return [
            'start_date' => $startDate,
            'end_date' => $endDate,
            'passengers' => $this->faker->numberBetween(1, 5),
            'user_id' => $this->faker->randomElement(User::pluck('id')->toArray()),
            'car_id' => $this->faker->randomElement(Car::pluck('id')->toArray()),

        ];
    }
}
