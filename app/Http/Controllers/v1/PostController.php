<?php

namespace App\Http\Controllers\v1;

use App\Exceptions\JsonException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $pageSize = $request->page_size ?? 20;
            $posts = Post::paginate($pageSize);
            //code...
        } catch (\Throwable $th) {
            //throw $th;
            throw new JsonException($th->getMessage(), 404);
        }
       
        return  PostResource::collection($posts);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
      try {
        $result= DB::transaction(function () use ($request) {
            $created = Post::create(
                [
                    'title' => $request->title,
                    'body' => $request->body
                ]
            );
            $created->users()->sync($request->user_ids);

            return $created;
        });
        //code...
      } catch (\Throwable $th) {
        //throw $th;
        throw new JsonException($th->getMessage(), 422);
      }
    return new PostResource($result);
        //

    }

    /**
     * Display the specified resource.
     */
    public function show($id)

    {
        
        $post = Post::find($id);
        throw_if(!$post, JsonException::class, 'Post Not Found',404);
    //     if(!$post){
    //     return response()->json([
    //         'message'=>'post not found'
    //     ],404);
    //    }
            return new PostResource($post);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {


        throw_if(!$request->title && !$request->body, JsonException::class, "Bad Request",400);



       $post->update([
            'title' => $request->title??$post->title,
            'body'=>$request->body??$post->body
        ]);
    
        return $post;
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        throw_if(!$post, JsonException::class, 'Post Not Found', 404);
      
        $post->forceDelete();
    
        // Return a success response.
        return response()->json(['message' => 'Post Deleted Successfully'], 200);
        //
    }
}
