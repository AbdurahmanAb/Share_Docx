<?php

use App\Http\Controllers\v1\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


        Route::get('/post', [PostController::class, 'index']);
        Route::get('/post/{post}', [PostController::class, 'show']);
        Route::post('/post', [PostController::class, 'store']);
        Route::patch('/post/{post}', [PostController::class, 'update']);
        Route::delete('/post/{post}',[PostController::class, 'destroy'] );
        Route::get('/shared/{post}',[PostController::class, 'share'])->name('shared.post')->middleware('signed');
        Route::get('/sign/{post}',[PostController::class, 'sign']);




?>
