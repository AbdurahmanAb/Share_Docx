<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;


        Route::get('/user', [UserController::class, 'index']);
        Route::get('/user/{User}', [UserController::class, 'show']);
        
         Route::post('/user', [UserController::class, 'store']);
        Route::patch('/user/{User}', [UserController::class, 'update']);
        Route::delete('/user/{User}',[UserController::class, 'destroy'] );




?>