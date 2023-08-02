<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test retrieving a list of products.
     *
     * @return void
     */
    public function testGetProducts()
    {
        // Create some sample products
        Product::factory()->count(3)->create();

        // Send a GET request to the index endpoint
        $response = $this->get('/api/products');

        // Assert that the response status code is 200 (OK)
        $response->assertStatus(200);

        // Assert that the response contains the correct number of products
        $response->assertJsonCount(3, 'data');
    }

    // Add other test methods for different controller actions, e.g., testCreateProduct, testUpdateProduct, etc.
}
