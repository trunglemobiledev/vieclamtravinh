<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/{any}', function () {
    return view('post');
  })->where('any', '.*');


  Route::get('/demo', function () {
    return dd("============");
});
