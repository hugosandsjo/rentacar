<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use function Pest\Laravel\actingAs;

class ViewBookingsTest extends TestCase
{
    use RefreshDatabase;

    public function test_bookings_view(): void
    {

        $user = User::factory()->create();

        $this->followingRedirects($user);

        $response = $this->actingAs($user)->post('view-bookings');

        $response->assertStatus(200);
    }
}
