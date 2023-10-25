<?php

namespace Tests\Unit;

use App\Http\Controllers\v1\PostController;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends Testcase
{
   use RefreshDatabase; 
  
   
    /**
     * A basic unit test example.
     */
  
    public function test_create()
    {
        $controller = app(PostController::class);

        $data = [
            'title' => 'TestTitle',
            'body' => [],
            'user_ids'=>[User::factory(1)->create()->first()->id]
        ];
    
        $response = $controller->store(new StorePostRequest(  $data));

        $this->assertSame($data['title'], $response->title, "Assertion Faild");
        // Assert the data exists in the database
    }

    public function test_update()
    {
        $controller = app(PostController::class);
        $post = Post::factory(1)->create()->first();
     
        $data = [
            'title' => 'abcdeghgh'
        ];
 
       $response = $controller->update(new UpdatePostRequest($data),$post);
     ;
        $this->assertSame($data['title'], $response->title, "error");
    }
    public function test_delete()
    { $controller = app(PostController::class);
        $post = Post::factory(1)->create()->first();
        $deleted = $controller->destroy($post->id);

        $found=Post::find($post->id);
        $this->assertSame(null, $found, "data not deleted");
    
    }      
}
