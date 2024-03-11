<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class CreateUserTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function test_create_user(): void
    {

        $this->withExceptionHandling();

        $data = [
            'name' => $this->faker->firstName(),
            'email' => $this->faker->unique()->email(),
            'password' => $this->faker->password(8, 20),
        ];

        $response = $this->post('createuser', $data);

        $this->assertDatabaseHas('users', [
            'name' => $data['name'],
            'email' => $data['email'],
        ]);

        $this->assertAuthenticated();

        $response->assertRedirect('/dashboard');
    }
}
