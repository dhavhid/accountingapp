<?php

namespace Tests\Feature;

use Tests\TestCase;
use Carbon\Carbon;

class TransactionsTest extends TestCase
{
    /**
     * Test that listing transactions works.
     *
     * @return void
     */
    public function testListTransactions()
    {
        $query = '_q=Alice&categoryId=259&iomethodId=2';
        $response = $this->withHeaders($this->getHeaders())
        ->get("/api/v1/transactions?{$query}");

        $response->assertStatus(200);
    }


    /**
     * Test that transaction listing is not available for unauthenticated users
     */
    public function testListTransactionsNoAuth() {
        $response = $this->withHeaders($this->noAuthHeaders())
            ->get('/api/v1/transactions');

        $response->assertStatus(401);
    }


    /**
     * Test that we can retrieve a single record
     */
    public function testShowTransaction() {

        gc_collect_cycles();
        $transaction = factory(\App\Transaction::class)->make();
        $transaction->save();

        $response = $this->withHeaders($this->getHeaders())
        ->get("/api/v1/transactions/{$transaction->id}");

        $response->assertStatus(200)
        ->assertJsonPath('data.transDate', (new Carbon($transaction->transdate))->toIsoString())
        ->assertJsonPath('data.amount', floatval($transaction->amount))
        ->assertJsonPath('data.description', $transaction->description)
        ->assertJsonPath('data.iomethodId', $transaction->iomethod_id)
        ->assertJsonPath('data.categoryId', $transaction->category_id);
    }

    /**
     * Test 404 response for a particular record
     */
    public function testShowTransaction404() {

        $response = $this->withHeaders($this->getHeaders())
            ->get("/api/v1/transactions/-1");

        $response->assertStatus(404);
    }


    /**
     * Test that creating a new transaction has success
     */
    public function testCreateTransaction() {

        gc_collect_cycles();
        $transaction = factory(\App\Transaction::class)->make();

        $response = $this->withHeaders($this->getHeaders())
            ->postJson('/api/v1/transactions', [
                'transDate' => (new Carbon($transaction->transdate))->toISOString(),
                'amount' => floatval($transaction->amount),
                'description' =>  $transaction->description,
                'iomethodId' => $transaction->iomethod_id,
                'categoryId' => $transaction->category_id,
            ]);

        $response->assertStatus(201);
    }

    /**
     * Test that the api does not allow to create a new transaction without a valid auth
     */
    public function testCreateTransactionNoAuth() {

        gc_collect_cycles();
        $transaction = factory(\App\Transaction::class)->make();

        $response = $this->withHeaders($this->noAuthHeaders())
            ->postJson('/api/v1/transactions', [
                'transDate' => (new Carbon($transaction->transdate))->toISOString(),
                'amount' => floatval($transaction->amount),
                'description' =>  $transaction->description,
                'iomethodId' => $transaction->iomethod_id,
                'categoryId' => $transaction->category_id,
            ]);

        $response->assertStatus(401);
    }

    /**
     * Test that the api does not allow to create a new transaction with invalid data
     */
    public function testCreateInvalidTransaction() {

        gc_collect_cycles();
        $transaction = factory(\App\Transaction::class)->make();

        $response = $this->withHeaders($this->getHeaders())
            ->postJson('/api/v1/transactions', [
                'transDate' => 'hello',
                'amount' => floatval($transaction->amount),
                'description' =>  $transaction->description,
                'iomethodId' => $transaction->iomethod_id,
                'categoryId' => $transaction->category_id,
            ]);

        $response->assertStatus(400);
    }

    /**
     * Test that we can update an existing record
     */
    public function testUpdateTransaction() {

        gc_collect_cycles();
        $transaction = factory(\App\Transaction::class)->make();
        $transaction->save();

        $response = $this->withHeaders($this->getHeaders())
            ->putJson("/api/v1/transactions/{$transaction->id}", [
                'transDate' => '2020-06-01T09:56:00.000Z',
                'description' => 'Compré agua en botella'
            ]);

        $response->assertStatus(202)
            ->assertJsonPath('data.transDate', '2020-06-01T09:56:00.000000Z')
            ->assertJsonPath('data.description', 'Compré agua en botella');
    }

    /**
     * Test 404 response for non existing transaction when updating
     */
    public function testUpdateTransaction404() {

        $response = $this->withHeaders($this->getHeaders())
            ->putJson("/api/v1/transactions/-1", [
                'transDate' => '2020-06-01T09:56:00.000Z',
                'description' => 'Compré agua en botella'
            ]);

        $response->assertStatus(404);
    }

    /**
     * Test that no transaction can be updated with no authentication
     */
    public function testUpdateTransactionWithNoAuth() {

        $response = $this->withHeaders($this->noAuthHeaders())
            ->putJson("/api/v1/transactions/-1", [
                'transDate' => '2020-06-01T09:56:00.000Z',
                'description' => 'Compré agua en botella'
            ]);

        $response->assertStatus(401);
    }

    /**
     * Test to delete a transaction with success
     */
    public function testDeleteTransaction() {

        gc_collect_cycles();
        $transaction = factory(\App\Transaction::class)->make();
        $transaction->save();

        $response = $this->withHeaders($this->getHeaders())
            ->delete("/api/v1/transactions/{$transaction->id}");

        $response->assertStatus(202);
    }

    /**
     * test to delete a non existing transaction
     */
    public function testDeleteTransaction404() {

        $response = $this->withHeaders($this->getHeaders())
            ->delete('/api/v1/transactions/-1');

        $response->assertStatus(404);
    }

    /**
     * Test to delete a transaction with no authentication
     */
    public function testDeleteTransactionNoAuth() {

        $response = $this->withHeaders($this->noAuthHeaders())
            ->delete('/api/v1/transactions/-1');

        $response->assertStatus(401);
    }
}
