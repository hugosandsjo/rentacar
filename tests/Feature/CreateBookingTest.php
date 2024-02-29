<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class CreateBookingTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_booking()
    {
        $user = User::factory()->create();

        $bookingData = [
            'start_date' => now()->addDays(rand(1, 10))->format('Y-m-d'),
            'end_date' => now()->addDays(rand(11, 20))->format('Y-m-d'),
            'passengers' => rand(1, 8),
            'car_id' => rand(1, 20),
            'user_id' => $user->id
        ];

        $response = $this->actingAs($user)
            ->post('/bookings', $bookingData);

        $response->assertRedirect('/dashboard');

        $this->assertDatabaseHas('bookings', $bookingData + ['user_id' => $user->id]);
    }
}
