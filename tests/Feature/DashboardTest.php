<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Car;
use Illuminate\Support\Facades\Hash;

use function Pest\Laravel\actingAs;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_dasboard_view(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        Car::factory()->create();

        $response = $this->get('/dashboard');
        $response->assertStatus(200);
        $response->assertViewHas('user');
        $response->assertViewHas('cars');
    }
}
