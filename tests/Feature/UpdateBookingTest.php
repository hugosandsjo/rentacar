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
    use RefreshDatabase;

    public function test_update_booking()
    {
        $this->withExceptionHandling();

        $user = User::factory()->create();
        $car = Car::factory()->create([
            'fileName' => 'test.jpg',
            'image' => 'test.jpg',
        ]);

        $booking = Booking::factory()->create([
            'user_id' => $user->id,
            'car_id' => $car->id
        ]);

        $updatedBookingData = [
            'start_date' => now()->addDays(rand(1, 10))->format('Y-m-d'),
            'end_date' => now()->addDays(rand(11, 20))->format('Y-m-d'),
            'passengers' => rand(1, 8),
            'car_id' => $car->id,
            'user_id' => $user->id
        ];

        $response = $this->actingAs($user)->patch(route('booking.update', ['booking' => $booking->id]), $updatedBookingData);

        // Assert view after update instead of redirect
        $response->assertStatus(200);

        $this->assertDatabaseHas('bookings', $updatedBookingData);
    }
}
