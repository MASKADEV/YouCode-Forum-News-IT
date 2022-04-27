<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

//Pulic Routes

//Private Routes
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //user Crud
    Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
    Route::get('/add', [App\Http\Controllers\PostController::class, 'add'])->name('posts.add');
    Route::post('/post/store', [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
});