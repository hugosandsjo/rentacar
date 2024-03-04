<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class CreateBookingTest extends TestCase
{

    use WithFaker, RefreshDatabase;

    public function test_create_booking()
    {

        $this->withExceptionHandling();

        $user = User::factory()->create();

        $bookingData = [
            'start_date' => now()->addDays(rand(1, 10))->format('Y-m-d'),
            'end_date' => now()->addDays(rand(11, 20))->format('Y-m-d'),
            'passengers' => rand(1, 8),
            'car_id' => rand(1, 20),
            'user_id' => $user->id
        ];

        $this->actingAs($user)
            ->post('/bookings', $bookingData)->assertRedirect('/dashboard');

        $this->assertDatabaseHas('bookings', $bookingData + ['user_id' => $user->id]);

        $this->get('/bookings')->assertSee($bookingData);
    }
}
