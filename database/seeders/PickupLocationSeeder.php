<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PickupLocationSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\PickupLocation::create([
            'name' => 'Landvetter Airport',
            'address' => 'Landed Airport, 438 80 Landvetter',
            'longitude' => '57.6682416',
            'latitude' => '12.2965896',
        ]);

        \App\Models\PickupLocation::create([
            'name' => 'Eriksberg',
            'address' => 'Eriksberg, 417 56 Göteborg',
            'longitude' => '57.703682',
            'latitude' => '11.9127933'
        ]);

        \App\Models\PickupLocation::create([
            'name' => 'Central Station',
            'address' => 'Centralstationen, 411 03 Göteborg',
            'longitude' => '57.7085894',
            'latitude' => '11.9684324'

        ]);
    }
}
