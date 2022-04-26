<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

//Public Links
Route::get('/', [PostController::class, 'index']);
Route::get('/auth', [UserController::class, 'index']);
Route::post('/register', [UserController::class, 'register']);
