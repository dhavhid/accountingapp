<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;

class TransactionsTest extends TestCase
{
    /**
     * Test that listing transactions works.
     *
     * @return void
     */
    public function testListTransactions()
    {
        $response = $this->withHeaders($this->getHeaders())
        ->get('/api/v1/transactions');

        $response->assertStatus(200);
    }
}
