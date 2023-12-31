<?php

namespace App\Http\Controllers\v1;

use App\Exceptions\JsonException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;

/**
 * Summary of CommentController
 * @group Comment Management
   * API To Manage Comments
 */
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CommentResource::collection(Comment::all());
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
        try {
           $comment = Comment::create([
                'body'=>$request->body,
                'user_id'=>$request->user_id,        
    'post_id'=>$request->post_id        ]);
            //code..
          
        } catch (\Throwable $th) {
            //throw $th;
            throw new JsonException($th->getMessage(),422);
        }
        return new CommentResource($comment);
      
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       
        $comment = Comment::find($id);
        throw_if(!$comment, JsonException::class, "Comment Not Found", 404);
        return $comment;
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $comment->update([
            'body'=>$request->body??$comment->body
           , 'user_id'=> $request->user_id??$comment->user_id,
            'post_id'=> $request->post_id??$comment->post_id
        ]);

        return $comment;
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        throw_if(!$comment, JsonException::class, "Comment Not found", 404);
            //return response()->json(["message"=>"comment doesn't exist"],404);

        $comment->forceDelete();
        return response()->json(['message' => 'comment Deleted']);
        //
    }
}
