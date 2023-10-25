<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase;
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
            "name" => "abdu",
            "email" => "abdurahman@gmail.com",
            "password" => "156486564"
        ];
        $response = $this->post('api/v1/user', $data);
        $response->assertStatus(200);
    }
    public function test_update()
    {
        $user = User::factory(1)->create()->first();
        $data = [
            "name" => "name updated"
        ];
    $response=    $this->patch("/api/v1/user/$user->id", $data);
        $response->assertStatus(200);
    }
public function test_delete()
{
        $user = User::factory(1)->create()->first();
        $response = $this->delete("/api/v1/user/$user->id");
        $response->assertStatus(200);
}
}
