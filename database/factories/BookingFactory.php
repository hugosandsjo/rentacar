<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

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
        $startDate = $this->faker->dateTimeBetween(Carbon::now(), Carbon::now()->addMonths(4));
        $endDate = (clone $startDate)->modify('+' . $this->faker->numberBetween(1, 7) . ' days');
        return [
            'start_date' => $startDate,
            'end_date' => $endDate,
            'passengers' => $this->faker->numberBetween(1, 5),
            'user_id' => $this->faker->randomElement(User::pluck('id')->toArray()),
            'car_id' => $this->faker->randomElement(Car::pluck('id')->toArray()),
        ];
    }
}
