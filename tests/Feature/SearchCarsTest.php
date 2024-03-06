<?php

namespace Tests\Feature;

use App\Models\Car;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SearchCarsTest extends TestCase
{
    use RefreshDatabase;

    public function test_search_cars()
    {
        $user = User::factory()->create();

        $car1 = Car::factory()->create(['max_passengers' => 4]);
        $car2 = Car::factory()->create(['max_passengers' => 2]);

        $this->actingAs($user);

        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);


        $response = $this->get('/search-cars?start_date=2022-01-01&end_date=2022-01-10&passengers=3');


        $response->assertStatus(200);

        $response->assertViewHas('availableCars');
        $response->assertViewHas('user');
        $response->assertViewHas('startDate', '2022-01-01');
        $response->assertViewHas('endDate', '2022-01-10');
        $response->assertViewHas('passengers', 3);

        $this->assertTrue($response['availableCars']->contains($car1));
        $this->assertFalse($response['availableCars']->contains($car2));
    }
}
