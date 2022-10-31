<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddScheduledRepaymentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_AddScheduledRepayment()
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
            'loan_id' => 6,
            'amount' => 80,
        ];
        $this->withHeaders($headers)
             ->patch('/api/add/scheduled-repayment', $laon_data)->assertSuccessful();
    }
}
