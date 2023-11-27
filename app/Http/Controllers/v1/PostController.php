<?php

namespace App\Http\Controllers\v1;

use App\Exceptions\JsonException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Markdown;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL as FacadesURL;
use PharIo\Manifest\Url;

/**
 * @group Post Management
 *  API to Manage Users
  **/

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

        $result = DB::transaction(function () use ($request) {
            $created = Post::create(
                [
                    'title' => $request->title,
                    'body' => $request->body,
                    'user_id'=>$request->user_id
                ]
            );
            $created->users()->sync($request->user_id);
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

       return  $post;
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

    public function share(Request $request, Post $post){
   return "Special Post For Your ass post {$post}";

  $user = User::whereId($post->id);
  $user->notify($post);
  Notification::send($user, $post);
    }

    public function sign(Request $request, Post $post){
 $url = FacadesURL::temporarySignedRoute('shared.post',now()->addSeconds(300),[
    'post'=>$post

]);
return $url;
    }


}
