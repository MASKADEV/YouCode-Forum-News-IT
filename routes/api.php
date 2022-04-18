<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;


//public Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/getposts', [PostController::class, 'index']);


// protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {

    //User Role
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/addPost', [PostController::class, 'store']);
    Route::put('/update/{id}', [PostController::class, 'update']);
    Route::delete('/delete/{id}', [PostController::class, 'destroy']);
    Route::post('/addComment', [CommentController::class, 'store']);

    //Admin Role
    
});
