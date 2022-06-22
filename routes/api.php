<?php

use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\CommentApiController;
use App\Http\Controllers\Api\PostApiController;
use App\Http\Controllers\Api\TagApiController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\Payment\XenditApiController;
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

// https://documenter.getpostman.com/view/8942795/TVmJhJv2

Route::get('authors/{id}', [UserApiController::class, 'show']);
Route::get('authors/{id}/posts', [UserApiController::class, 'posts']);
Route::get('authors/{id}/comments', [UserApiController::class, 'comments']);

// public routes
Route::get('/login', [UserApiController::class, 'login']);
Route::post('/register', [UserApiController::class, 'store']);
Route::get('/posts', [PostApiController::class, 'index']);
// Route::get('/posts', [PostApiController::class, 'show']);
Route::get('/posts/search/{name}', [PostApiController::class, 'search']);
Route::post('forgot-password', [UserApiController::class, 'forgotPassword']);

// protected routes
Route::middleware('auth:sanctum')->group(function(){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/posts', [PostApiController::class, 'store']);
    Route::put('/posts/{id}', [PostApiController::class, 'update']);
    Route::delete('/posts/{id}', [PostApiController::class, 'delete']);
    Route::get('/logout', [UserApiController::class, 'logout']);
    Route::post('/update-password',[UserApiController::class, 'updatePassword']);
});
Route::prefix('xendit')->group(function(){
    Route::get('/va/list', [XenditApiController::class, 'getApiVa']);
    Route::post('/invoice', [XenditApiController::class, 'createVa']);
    Route::post('/callback', [XenditApiController::class, 'callbackVa']);
    Route::post('/cb-payment', [XenditApiController::class, 'callbackPayment']);
});
