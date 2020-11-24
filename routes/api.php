<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LikeController;
use Illuminate\Http\Request;
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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::group([

    //'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

});

Route::apiResource('/question', App\Http\Controllers\QuestionController::class);
Route::apiResource('/category', App\Http\Controllers\CategoryController::class);
//Route::apiResource('/like', App\Http\Controllers\LikeController::class);
Route::apiResource('/question/{question}/reply', App\Http\Controllers\QuestionController::class);
//Route::get('/question_id/{id}', [App\Http\Controllers\QuestionController::class, 'index']);
Route::post('/like/{reply}',[LikeController::class, 'likeit']);
Route::delete('/like/{reply}',[LikeController::class, 'unLikeIt']);
