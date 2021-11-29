<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Response;

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

Route::post('/login',[AuthController::class, 'login']);
Route::post('/register',[AuthController::class, 'register']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::resource('/admin/post', PostController::class);
    Route::get('/admin/getPost',[PostController::class, 'getPost']);
});

Route::fallback(function () {
    return response()->json(
        [
            'message' => "404 - Serve",
        ],
        404
    );
});

