<?php

namespace App\Http\Controllers;

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
        $pageSize = $request->page_size ?? 20;
        $posts = Post::paginate($pageSize);
        return  PostResource::collection($posts);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
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
     

        return new PostResource($result);
        //

    }

    /**
     * Display the specified resource.
     */
    public function show($id)

    {
        $post = Post::find($id);
        if(!$post){
        return response()->json([
            'message'=>'post not found'
        ],404);
       }        return new PostResource($post);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        // $updated = $request->only([
        //     "title",
        //     "body"
        // ]);
       $updated= $post->update(
            ['title'=>$request->title?? $post->title,
            'body'=>$request->body ?? $post->body
            ]
        );
        if(!$updated){
            return response()->json(["message" => "Bad request"], 400);

        }
        return new PostResource($post);
        // response()->json(['message'=> 'request updated'], 200);
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json(['message' => 'Post Not Found'], 404);
        }
     
        // Delete the user.
        $post->forceDelete();
    
        // Return a success response.
        return response()->json(['message' => 'Post Deleted Successfully'], 200);
        //
    }
}
