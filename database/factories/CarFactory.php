<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Car;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'max_passengers' => $this->faker->numberBetween(6, 7),
            'brand' => $this->faker->word(),
            'model' => $this->faker->word(),
            'price' => $this->faker->randomDigit(),
        ];
    }
}
