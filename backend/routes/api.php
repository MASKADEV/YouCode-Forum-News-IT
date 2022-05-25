<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\authAdmine;
use App\Http\Controllers\categorieController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;

//User Gestion
Route::put('/user/{id}', [AuthController::class, 'update']);
Route::get('/user/{id}', [AuthController::class, 'show']);
Route::post('/testPass/{id}', [AuthController::class, 'testPass']);
Route::get('/users', [AuthController::class, 'index']);
Route::delete('/user/{id}', [AuthController::class, 'destroy']);


//Authentication Ops
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/loginAdmin', [authAdmine::class, 'login']);
// Route::post('/registerAdmin', [authAdmine::class, 'register']);

//Post Gestion
Route::get('/post', [PostController::class, 'index']);
Route::get('/post/user/{id}', [PostController::class, 'getPostsByUser']);
Route::get('/post/search/{name}', [PostController::class, 'search']);
Route::get('post/categorie/{id}', [PostController::class, 'postsByCategorie']);
Route::get('/post/{id}', [PostController::class, 'show']);
Route::post('/getAllPosts', [PostController::class, 'getAllPosts']);
Route::post('/post/like', [PostController::class, 'likes']);
Route::post('/post/dislike', [PostController::class, 'dislikes']);
Route::delete('post/like/{id}', [PostController::class, 'destroyLike']);
Route::delete('post/dislike/{id}', [PostController::class, 'destroydisLike']);
Route::delete('/post/{id}', [PostController::class, 'destroy']);

//Categories Gestion
Route::get('/categorie', [categorieController::class, 'index']);

Route::get('/token', function () {
    return csrf_token();
});

// Comment Gestion
Route::get('/comment/{id}', [CommentController::class, 'show']);
Route::get('/getAllComments', [CommentController::class, 'getAllComments']);
Route::delete('/comment/{id}', [CommentController::class, 'destroy']);

//Middleware Gestion
Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('/post', [PostController::class, 'store']);
    Route::post('/comment', [CommentController::class, 'store']);
    Route::put('/post/{id}', [PostController::class, 'update']);
    Route::post('/logout', [AuthController::class, 'logout']);

});