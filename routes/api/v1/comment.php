<?php

use App\Http\Controllers\v1\CommentController;

use Illuminate\Support\Facades\Route;


        Route::get('/comment', [CommentController::class, 'index']);
        Route::get('/comment/{comment}', [CommentController::class, 'show']);
        
         Route::post('/comment', [CommentController::class, 'store']);
        Route::patch('/comment/{comment}', [CommentController::class, 'update']);
        Route::delete('/comment/{comment}',[CommentController::class, 'destroy'] );




?>