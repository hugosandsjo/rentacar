<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Booking;
use App\Models\User;
use App\Models\Car;
use Tests\TestCase;

class DeleteBookingTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function test_delete_booking()
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

        $response = $this->actingAs($user)->delete(route('booking.destroy', ['booking' => $booking->id]));

        $response->assertRedirect('dashboard');
        $this->assertDatabaseMissing('bookings', ['id' => $booking->id]);
    }
}
