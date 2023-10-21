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
    // public function test_example(): void
    // {
    //     $this->assertTrue(true);
    // }.
    public function test_create()
    {
        $data = [
            'title'=>'TestTitle',
            'body'=>[]
        ]; 
         $controller = app(PostController::class);
        $response = $controller->store(new StorePostRequest($data));
        $this->assertInstanceOf(Post::class, $response);
     //   $response->assertStatus(201);
        //test create Method
    
        
    }

    public function test_update()
    {
        
    }
    public function test_delete()
    {
        
    }
}
