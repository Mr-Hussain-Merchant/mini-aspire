<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateLoanTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_CreateLoanSuccessfully()
    {
        $login_data = [
            'email' => 'hussain@gmail.com',
            'password' => '123456',
        ];
        
        $response = $this->json('post', '/api/login', $login_data);
        $response->assertSuccessful();
        $get_token = json_decode($response->getContent(),true);
        $token = $get_token['Authorisation Token'];
        $headers = [
            'Accept' => 'application/json',
            'Authorization' => $token
        ];

        $laon_data = [
            'amount' => 20,
            'tenure' => 2,
        ];
        $this->withHeaders($headers)
             ->post('/api/create/loan', $laon_data)->assertSuccessful();
    }
}
