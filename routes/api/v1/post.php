<?php

use App\Http\Controllers\v1\PostController;

use Illuminate\Support\Facades\Route;


        Route::get('/post', [PostController::class, 'index']);
        Route::get('/post/{post}', [PostController::class, 'show']);
        
         Route::post('/post', [PostController::class, 'store']);
        Route::patch('/post/{post}', [PostController::class, 'update']);
        Route::delete('/post/{post}',[PostController::class, 'destroy'] );




?>