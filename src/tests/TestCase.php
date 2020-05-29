<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $headers;

    function getHeaders() {

        if (is_array($this->headers)) return $this->headers;
        extract($this->getEnvVars());
        $this->headers = [
            'Accept' => 'application/json',
            'Authorization' => "Bearer {$token}"
        ];
        return $this->headers;
    }

    function getEnvVars() {
        return [
            'user' => env('USER_EMAIL'),
            'pass' => env('USER_PASS'),
            'client_id' => env('CLIENT_ID'),
            'client_secret' => env('CLIENT_SECRET'),
            'token' => env('TOKEN')
        ];
    }

    function noAuthHeaders() {
        return [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer XX23'
        ];
    }
}
