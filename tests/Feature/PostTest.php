<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;
    //use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_create()
{
    $data = [
        'title' => 'TestTitle 246532',
        'body' => 'Post Testing',
        'user_id'=>  User::factory()->count(2)->create()->pluck('id')->toArray(),
    ];
    

    $response = $this->post('/api/v1/post', $data);

    $response->assertStatus(201); // Assert the response status code

    $this->assertDatabaseHas('posts', $data); // Assert the data exists in the database
}


public function test_update()
    {
        $post = Post::factory(1)->create()->first();
        $data = [
            "title" => "This is my nigga's Second title"
        ];
       $response =  $this->patch("/api/v1/post/$post->id",$data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('posts', [
            'id'=>$post->id,
            'title' => $data['title']
        ]);

    }
 public function test_delete()
 {
        $post = Post::factory(1)->create()->first();
        $response = $this->delete("/api/v1/post/$post->id");
        $response->assertStatus(200);
        $this->assertDatabaseMissing('posts',$post->toArray());
    }

}
