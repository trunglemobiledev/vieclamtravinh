<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

use App\Http\Controllers\Admin\NganhNgheController;
use App\Http\Controllers\Admin\BaiDangTuyenController;
use App\Http\Controllers\Admin\HoSoUngVienController;
use App\Http\Controllers\Admin\LoaiCongViecController;
use App\Http\Controllers\Admin\TinhController;
use App\Http\Controllers\Admin\HuyenController;
use App\Http\Controllers\Admin\PhuongXaController;
use App\Http\Controllers\Admin\UserController;

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
    Route::resource('/admin/nganh-nghe', NganhNgheController::class);
    Route::resource('/admin/bai-dang-tuyen', BaiDangTuyenController::class);
    Route::resource('/admin/ho-so-ung-vien', HoSoUngVienController::class);
    Route::resource('/admin/loai-cong-viec', LoaiCongViecController::class);
    Route::resource('/admin/tinh', TinhController::class);
    Route::resource('/admin/quan-huyen', HuyenController::class);
    Route::resource('/admin/phuong-xa', PhuongXaController::class);
    Route::resource('/admin/user',UserController::class);
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

