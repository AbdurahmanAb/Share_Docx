<?php

namespace Tests\Unit;

use App\Http\Controllers\v1\UserController;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
   use RefreshDatabase;
    /**
     * A basic unit test example.
     */
 
 public function test_create()
 {
        $controller = app(UserController::class);
        $data = [
            "name" => "Abdu",
            "email" => "abdurahmanabdela47@gmail.com",
            "password" => "123548"
        ];

        $created = $controller->store(new StoreUserRequest($data));

        $this->assertSame($data["name"], $created->name);
        
 }
 public function test_update()
 {
    $controller = app(UserController::class);
   $user = User::factory(1)->create()->first();
        $data = [
            "name" => "Abdu254",
            "email" => "abdurahman@gmail.com",
        ];
        $updated = $controller->update(new UpdateUserRequest($data), $user);
        $this->assertSame($data["name"], $updated->name);  
 }
 public function test_delete()
 {
        $controller = app(UserCOntroller::class);
        $user = User::factory(1)->create()->first();
        $controller->destroy($user->id);
        $found = User::find($user->id);
        $this->assertSame(null, $found);
 }

}
