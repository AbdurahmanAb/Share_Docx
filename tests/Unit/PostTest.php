<?php

namespace Tests\Unit;

use App\Http\Controllers\v1\PostController;
use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{
    public $controller = new PostController;
    /**
     * A basic unit test example.
     */
    // public function test_example(): void
    // {
    //     $this->assertTrue(true);
    // }
    public function test_create()
    {
        $data = [];
        $create = $this->controller->store($data);
        //test create Method
    
        
    }

    public function test_update()
    {
        
    }
    public function test_delete()
    {
        
    }
}
