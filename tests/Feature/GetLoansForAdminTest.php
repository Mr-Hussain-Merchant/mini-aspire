<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetLoansForAdminTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_GetLoansAdmin()
    {
        $login_data = [
            'email' => 'admin@gmail.com',
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
        $this->withHeaders($headers)
             ->get('/api/get/loans')->assertSuccessful();
    }
}
