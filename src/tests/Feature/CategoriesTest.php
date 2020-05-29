<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Carbon\Carbon;
use Tests\TestCase;

class CategoriesTest extends TestCase
{

    /**
     * Test the listing GET method
     *
     * @return void
     */
    public function testCategoriesList()
    {
        $params = '_q=credit&sort=title&sord=asc&page=1&per_page=10';
        $response = $this->withHeaders($this->getHeaders())
                    ->get('/api/v1/categories?' . $params);
        $response->assertStatus(200)
        ->assertHeader('Content-Type', 'application/json');
    }

    /**
     * Test the listing GET method with no authentication
     *
     * @return void
     */
    public function testListCategoriesNoAuth()
    {
        $response = $this->withHeaders($this->noAuthHeaders())
                    ->get('/api/v1/categories');

        $response->assertStatus(401);
    }

    /**
     * Test to retrieve a particular category
     *
     * @return void
     */
    public function testShowCategory() {

        $category = factory(\App\Category::class)->make();
        $category->save();

        $response = $this->withHeaders($this->getHeaders())
                    ->getJson('/api/v1/categories/'.$category->id);
        $response->assertStatus(200)
        ->assertHeader('Content-Type', 'application/json')
        ->assertJson([
            'data' => [
                'id' => $category->id,
                'title' => $category->title,
                'description' => $category->description,
                'isOutput' => boolval($category->output),
                'createdAt' => (new Carbon($category->created_at))->toISOString(),
                'updatedAt' => (new Carbon($category->updated_at))->toISOString()
            ]
        ]);
    }

    /**
     * Test that the particular category does not exists
     *
     * @return void
     */
    public function testShowCategory404() {

        $response = $this->withHeaders($this->getHeaders())
                    ->getJson('/api/v1/categories/0');
        $response->assertStatus(404);
    }
}
