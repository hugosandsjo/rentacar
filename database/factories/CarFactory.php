<?php

namespace Database\Factories;


use Faker\Provider\FakeCar;
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

        $this->faker->addProvider(new FakeCar($this->faker));
        $vehicle = $this->faker->vehicleArray();
        return [
            'max_passengers' => $this->faker->vehicleSeatCount,
            'brand' =>  $vehicle['brand'],
            'model' => $vehicle['model'],
            'price' => $this->faker->numberBetween(100, 1000),
        ];
    }
}
