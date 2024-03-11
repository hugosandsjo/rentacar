<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Booking;
use App\Models\Car;

class UpdateBookingTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_update_booking()
    {
        $this->withExceptionHandling();

        $user = User::factory()->create();

        $car = Car::factory()->create();

        $booking = Booking::factory()->create();

        $start_date = $this->faker->dateTimeBetween('now', '+2 years');
        $end_date = (clone $start_date)->modify('+' . rand(1, 14) . ' days');

        $updatedBookingData = [
            'start_date' => $start_date->format('Y-m-d'),
            'end_date' => $end_date->format('Y-m-d'),
            'passengers' => $this->faker->numberBetween(1, 8),
            'car_id' => $car->id,
            'user_id' => $user->id
        ];

        $response = $this->actingAs($user)->patch(route('booking.update', ['booking' => $booking->id]), $updatedBookingData);

        $response->assertStatus(200);

        $this->assertDatabaseHas('bookings', $updatedBookingData);
    }
}
