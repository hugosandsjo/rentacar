<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        for ($i = 0; $i < 8; $i++) {
            \App\Models\Car::create([
                'max_passengers' => 5,
                'brand' => 'Volvo',
                'model' => 'V90',
                'price' => 700,
                'fileName' => 'volvo.png',
                'image' => 'images/volvo.png',
                'pickup_location_id' => rand(1, 3)
            ]);
        }


        for ($i = 0; $i < 5; $i++) {
            \App\Models\Car::create([
                'max_passengers' => 2,
                'brand' => 'Ford',
                'model' => 'Mustang',
                'price' => 100,
                'fileName' => 'mustang.png',
                'image' => 'images/mustang.png',
                'pickup_location_id' => rand(1, 3)
            ]);
        }

        for ($i = 0; $i < 8; $i++) {
            \App\Models\Car::create([
                'max_passengers' => 4,
                'brand' => 'Tesla',
                'model' => 'Model 3',
                'price' => 600,
                'fileName' => 'tesla.png',
                'image' => 'images/tesla.png',
                'pickup_location_id' => rand(1, 3)
            ]);
        }

        for ($i = 0; $i < 3; $i++) {
            \App\Models\Car::create([
                'max_passengers' => 4,
                'brand' => 'Rolls Royce',
                'model' => 'Phantom',
                'price' => 1500,
                'fileName' => 'rollsroyce.png',
                'image' => 'images/rollsroyce.png',
                'pickup_location_id' => rand(1, 3)
            ]);
        }

        for ($i = 0; $i < 5; $i++) {
            \App\Models\Car::create([
                'max_passengers' => 8,
                'brand' => 'Mercedes',
                'model' => 'Sprinter',
                'price' => 1300,
                'fileName' => 'mercedes.png',
                'image' => 'images/mercedes.png',
                'pickup_location_id' => rand(1, 3)
            ]);
        }
    }
}
