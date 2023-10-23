<?php

namespace Tests\Unit;

use App\Http\Controllers\v1\PostController;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends Testcase
{
   use RefreshDatabase; 
  
   
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }
    public function test_create()
    {
        $controller = app(PostController::class);

        $data = [
            'title' => 'TestTitle',
            'body' => []
        ];
    
        $response = $controller->store(new StorePostRequest(  $data));

        $this->assertSame($data['title'], $response->title, "Assertion Faild");
        // Assert the data exists in the database
    }

    public function test_update()
    {
        
    }
    public function test_delete()
    {
        
    }
}
