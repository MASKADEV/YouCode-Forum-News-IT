<?php

use App\Http\Controllers\authAdmine;
use App\Http\Controllers\categorieController;

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// public routes 

// Route::resource('post',PostController::class);
//start comment

Route::get('/comment/{id}', [CommentController::class, 'show']);
Route::get('/getAllComments', [CommentController::class, 'getAllComments']);


// end comment

Route::put('/user/{id}', [AuthController::class, 'update']);
Route::get('/user/{id}', [AuthController::class, 'show']);
Route::post('/testPass/{id}', [AuthController::class, 'testPass']);

Route::post('/register', [AuthController::class, 'register']);
Route::get('/post', [PostController::class, 'index']);
Route::get('/post/user/{id}', [PostController::class, 'getPostsByUser']);
Route::get('/categorie', [categorieController::class, 'index']);
Route::get('/post/{id}', [PostController::class, 'show']);
Route::get('/post/search/{name}', [PostController::class, 'search']);
Route::get('post/categorie/{id}', [PostController::class, 'postsByCategorie']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/users', [AuthController::class, 'index']);
Route::delete('/user/{id}', [AuthController::class, 'destroy']);

Route::post('/loginAdmin', [authAdmine::class, 'login']);
Route::post('/registerAdmin', [authAdmine::class, 'register']);

Route::post('/getAllPosts', [PostController::class, 'getAllPosts']);

Route::post('/post/like', [PostController::class, 'likes']);
Route::post('/post/dislike', [PostController::class, 'dislikes']);
Route::delete('post/like/{id}', [PostController::class, 'destroyLike']);
Route::delete('post/dislike/{id}', [PostController::class, 'destroydisLike']);

Route::delete('/post/{id}', [PostController::class, 'destroy']);

Route::get('/token', function () {
    return csrf_token();
});


// protected routes
Route::delete('/comment/{id}', [CommentController::class, 'destroy']);


Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('/post', [PostController::class, 'store']);
    Route::post('/comment', [CommentController::class, 'store']);
    Route::put('/post/{id}', [PostController::class, 'update']);

    Route::post('/logout', [AuthController::class, 'logout']);
});
