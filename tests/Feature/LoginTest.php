<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_LoginSuccessfully()
    {
        $payload = [
            'email' => 'hussain@gmail.com',
            'password' => '123456',
        ];

        $this->json('post', '/api/login', $payload)
            ->assertSuccessful();
    }
}
