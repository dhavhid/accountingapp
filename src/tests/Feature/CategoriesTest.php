<?php

namespace Tests\Feature;

use App\Category;
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
    public function testListCategories()
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


    /**
     * Test that create a category is correct
     */
    public function testCreateCategory() {

        $category = factory(\App\Category::class)->make();

        $response = $this->withHeaders($this->getHeaders())
                    ->postJson('/api/v1/categories', [
                        'title' => $category->title,
                        'description' => $category->description,
                        'isOutput' => $category->output
                    ]);

        $response->assertStatus(201)
                ->assertJsonPath('data.title', $category->title)
                ->assertJsonPath('data.description', $category->description)
                ->assertJsonPath('data.isOutput', boolval($category->output));
    }

    /**
     * Test that to create a category fails due to lacking some mandatory params
     */
    public function testCreateWrongCategory() {

        $response = $this->withHeaders($this->getHeaders())
                    ->postJson('/api/v1/categories', [
                        'description' => ''
                    ]);

        $response->assertStatus(400);
    }

    /**
     * Test that a category cannot be created if not authenticated
     */
    public function testCreateCategoryNoAuth() {
        $response = $this->withHeaders($this->noAuthHeaders())
            ->postJson('/api/v1/categories', [
                'title' => 'Gas',
                'description' => 'none',
                'isOutput' => 1
            ]);

        $response->assertStatus(401);
    }

    /**
     * Test to update a category
     */
    public function testUpdateCategory() {

        $category = factory(\App\Category::class)->make();
        $category->save();

        $response = $this->withHeaders($this->getHeaders())
                ->putJson("/api/v1/categories/{$category->id}", [
                   'description' => 'No description'
                ]);

        $response->assertStatus(202)
            ->assertJsonPath('data.description', 'No description');
    }

    /**
     * Test that an invalid value when editing throws error
     */
    public function testUpdateWrongCategory() {

        $category = factory(\App\Category::class)->make();
        $category->save();

        $response = $this->withHeaders($this->getHeaders())
            ->putJson("/api/v1/categories/{$category->id}", [
                'isOutput' => 2
            ]);

        $response->assertStatus(400);
    }

    /**
     * Test to update an unexisting category
     */
    public function testUpdateCategory404() {

        $response = $this->withHeaders($this->getHeaders())
            ->putJson("/api/v1/categories/-1", [
                'description' => 'No description'
            ]);

        $response->assertStatus(404);
    }

    /**
     * Test to update a category without authentication
     */
    public function testUpdateCategoryNoAuth() {

        $response = $this->withHeaders($this->noAuthHeaders())
            ->putJson('/api/v1/categories/1', [
                'title' => 'Gas',
                'description' => 'none',
                'isOutput' => 1
            ]);

        $response->assertStatus(401);
    }

    /**
     * Test to delete a valid category
     */
    public function testDeleteCategory() {

        $category = factory(\App\Category::class)->make();
        $category->save();

        $response = $this->withHeaders($this->getHeaders())
            ->delete("/api/v1/categories/{$category->id}");

        $response->assertStatus(202);
    }

    /**
     * Test to delete an unexisting category
     */
    public function testDeleteCategory404() {

        $response = $this->withHeaders($this->getHeaders())
            ->delete("/api/v1/categories/-1");

        $response->assertStatus(404);
    }

    /**
     * Test to delete a valid category but with no authentication
     */
    public function testDeleteCategoryNoAuth() {

        $category = factory(\App\Category::class)->make();
        $category->save();

        $response = $this->withHeaders($this->noAuthHeaders())
            ->delete("/api/v1/categories/{$category->id}");

        $response->assertStatus(401);
    }

}
