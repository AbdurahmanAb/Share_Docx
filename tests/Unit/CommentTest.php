<?php

namespace Tests\Unit;

use App\Http\Controllers\v1\CommentController;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;



class CommentTest extends TestCase
{
    use RefreshDatabase;
   // use RefreshDatabase;
    /**
     * A basic unit test example.
     */
  public function test_create()
  {
        $controller = app(CommentController::class);
        $data = [
            'body' => [],
            'post_id' => Post::factory(1)->create()->first()->id,
            'user_id' => User::factory(1)->create()->first()->id
        ];

        $created = $controller->store(new StoreCommentRequest($data));
        $this->assertSame($data['body'],$created->body, "Assertion Faild");
  }
  public function test_update()
  {
    $controller = app(CommentController::class);   
    $comment = Comment::factory(1)->create()->first();
        $data = [
            'body' => Comment::factory(1)->create()->first()->body
        ];
        $updated = $controller->update(new UpdateCommentRequest($data), $comment);
        $this->assertSame($data['body'], $updated->body,"Assertion Faild");
    
  }
  public function test_delete()
  {
        $controller = app(CommentController::class);
    $comment = Comment::factory(1)->create()->first();
         $controller->destroy($comment->id);
        $found = Comment::find($comment->id);
        $this->assertSame(null, $found, "Assertion Faild");
    
  }

}
