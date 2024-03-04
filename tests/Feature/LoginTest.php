<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_login_form()
    {
        $response = $this->get('/');
        $response->assertSeeText('Email');
        $response->assertStatus(200);
    }

    public function test_login_user()
    {
        $user = User::create(['name' => 'Henrik', 'email' => 'henrik@yrgo.se', 'password' => Hash::make('123')]);

        $this->followingRedirects($user);

        Route::post('login', LoginController::class)->middleware('guest');

        $this->actingAs($user)->get('/dashboard')->assertSee($user->name);
    }

    public function test_login_user_without_password()
    {
        $response = $this->post(
            '/login',
            [
                'email' => 'nonexistentuser@example.com',
                'password' => 'somepassword',
            ]
        );

        $response->assertSessionHasErrors();
    }
}
