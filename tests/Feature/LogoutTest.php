<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\Models\User;

class LogoutTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_logout_user()
    {
        $user = User::create(['name' => 'Henrik', 'email' => 'henrik@yrgo.se', 'password' => Hash::make('123')]);

        $this->followingRedirects($user);

        Route::post('logout', LogoutController::class)->middleware('guest');

        $this->actingAs($user)->get('/dashboard')->assertSee($user->name);
    }
}
