<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    //use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function testCreate()
{
    $data = [
        'title' => 'TestTitle',
        'body' => []
    ];

    $response = $this->post('/api/v1/post', $data);

    $response->assertStatus(201); // Assert the response status code

    $this->assertDatabaseHas('posts', $data); // Assert the data exists in the database
}
}
