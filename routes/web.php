<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


//Pulic Routes
Route::get('/', function () {
    return view('layouts/app');
});
Auth::routes();

//Private Routes
Route::group(['middleware' => ['auth']], function () {

    //Post Crud
    Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
    Route::get('/home', [App\Http\Controllers\PostController::class, 'latest'])->name('home');
    Route::get('/add', [App\Http\Controllers\PostController::class, 'add'])->name('posts.add');
    Route::post('/post/store', [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
    Route::get('/postpreview/{id}', [App\Http\Controllers\PostController::class, 'postPreview'])->name('posts.preview');
    
    //Comment Crud
    Route::post('/addComment', [App\Http\Controllers\CommentController::class, 'addComment'])->name('comment.addcomment');
    Route::post('/deleteComment', [App\Http\Controllers\CommentController::class, 'deleteComment'])->name('comment.delete');
    
    //User Crud
    Route::get('/profile', [App\Http\Controllers\UserController::class, 'index'])->name('profile.index');
});