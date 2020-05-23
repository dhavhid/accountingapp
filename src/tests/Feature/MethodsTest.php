<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MethodsTest extends TestCase
{
    /**
     * Test the route v1/methods.
     *
     * @return void
     */
    public function testListMethods()
    {
        $response = $this->withHeaders($this->getHeaders())->get('/api/v1/methods');
        $response->assertStatus(200)->assertHeader('Content-Type', 'application/json');
    }

    public function testListMethodNoAuth()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer XX23'
        ])->get('/api/v1/methods');

        $response->assertStatus(401);
    }
}
