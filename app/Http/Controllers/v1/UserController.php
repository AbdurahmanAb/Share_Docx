<?php

namespace App\Http\Controllers\v1;

use App\Events\User\UserCreated;
use App\Exceptions\JsonException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

use App\Http\Resources\UserResource;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Support\Facades\Hash;

class UserController  extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    
        return  UserResource::collection(User::all());
        
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
       try {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        event(new UserCreated($user));
    
        //code...
       } catch (\Throwable $th) {
        //throw $th;
        throw new JsonException($th->getMessage(),422);
       }
       
        return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $User = User::find($id);
        throw_if(!$User, JsonException::class , "User Not Found ",404);
        return $User;
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $User)
    {
        throw_if(!$User->name || !$User->email || !$User->password, JsonException::class, "Request not fullfilled");
        $User->update([
            'name'=>$request->name??$User->name,
        'email'=>$request->email??$User->email,
    'password'=>$request->password??$User->password        ]);
        //

        return $User;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $User = User::find($id);
        throw_if(!$User, JsonException::class, "User Not found", 404);
        $User->delete();
        return response()->json(["Message"=>"user Deleted"]);
        
        // Delete the record.
    
    }
}
