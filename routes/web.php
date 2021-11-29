<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/{any}', function () {
//     return view('post');
//   })->where('any', '.*');

Route::get('/', function () {
    return view('welcome');
});
// // Login
// Route::get("/be/login",[LoginController::class, 'index']);
// Route::post("/be/login",[LoginController::class, 'login']);

// Route::get("/register",function() {
//     return view("register");
// });

// Route::get("/admin",function() {
//     return view("dashboard");
// });

// Route::get("/admin/list-user",function() {
//     return view("admin.listUser");
// });
