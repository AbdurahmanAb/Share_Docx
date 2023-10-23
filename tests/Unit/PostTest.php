<?php

namespace Tests\Unit;

use App\Http\Controllers\v1\PostController;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase; 
  
   
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }
    // public function testCreate()
    // {
    //     $data = [
    //         'title' => 'TestTitle',
    //         'body' => 'TestBody'
    //     ];
    
    //     $response = $this->post('/posts', $data);
    
    //     $response->assertStatus(201); // Assert the response status code
    
    //     $this->assertDatabaseHas('posts', $data); // Assert the data exists in the database
    // }

    // public function test_update()
    // {
        
    // }
    // public function test_delete()
    // {
        
    // }
}
