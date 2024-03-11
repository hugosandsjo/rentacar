<?php

namespace Tests\Feature;

use App\Models\Car;
use App\Models\User;
use App\Models\PickupLocation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SearchCarsTest extends TestCase
{
    use RefreshDatabase;

    public function test_search_cars()
    {
        $user = User::factory()->create();

        $pickupLocation = new PickupLocation;
        $pickupLocation->id = 1;

        $car1 = Car::factory()->create(['max_passengers' => 4, 'pickup_location_id' => $pickupLocation->id]);
        $car2 = Car::factory()->create(['max_passengers' => 2, 'pickup_location_id' => $pickupLocation->id]);

        $this->actingAs($user);

        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

        $response = $this->get('/search-cars?start_date=2022-01-01&end_date=2022-01-10&pickup_location=' . $pickupLocation->id . '&passengers=3');

        $response->assertStatus(200);

        $response->assertViewHas('availableCars');
        $response->assertViewHas('user');
        $response->assertViewHas('startDate', '2022-01-01');
        $response->assertViewHas('endDate', '2022-01-10');
        $response->assertViewHas('passengers', 3);
        $response->assertViewHas('pickupLocations');

        $this->assertTrue($response['availableCars']->contains($car1));
        $this->assertFalse($response['availableCars']->contains($car2));
    }
}
