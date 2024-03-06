<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SignupTest extends TestCase
{

    public function test_show_signup_form()
    {
        $response = $this->get('/signup');

        $response->assertStatus(200);
        $response->assertViewIs('signup');
    }
}
