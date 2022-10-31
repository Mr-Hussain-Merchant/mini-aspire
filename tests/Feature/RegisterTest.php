<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testsRegistersSuccessfully()
    {
        $payload = [
            'name' => 'Hussain',
            'email' => 'hussain@gmail.com',
            'password' => '123456',
        ];

        $this->json('post', '/api/register', $payload)
            ->assertSuccessful();;
    }
}
