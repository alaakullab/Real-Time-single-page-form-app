<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReplyController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::get('/question', 'QuestionController@index');

Route::apiResource('question', QuestionController::class);
Route::apiResource('category', CategoryController::class);
Route::apiResource('question/{question}/reply',ReplyController::class);

Route::post('like/{reply}/', [LikeController::class, 'likeIt']);
Route::delete('like/{reply}/', [LikeController::class, 'unlikeIt']);

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::CLass, 'login']);
    Route::post('logout', [AuthController::CLass, 'logout']);
    Route::post('refresh', [AuthController::CLass, 'refresh']);
    Route::post('me', [AuthController::CLass, 'me']);

});
