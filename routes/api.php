<?php

use App\Http\Controllers\AuthCotroller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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


Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthCotroller::class, 'login']);
});

Route::group(['prefix' => 'user'], function () {
    Route::get('',[UserController::class, 'list']);
    Route::post('/create', [UserController::class,'store']);
    Route::get('/{user}', [UserController::class,'getUser']);
    Route::post('/{user}', [UserController::class,'edit']);
    Route::put('/{user}/disabled', [UserController::class,'disable']);
    Route::put('/{user}/enabled', [UserController::class,'enable']);
});

Route::group(['prefix' => 'product'], function () {
    Route::get('',[ProductController::class, 'list']);
    Route::post('/create', [ProductController::class,'store']);
    Route::get('/{product}',[ProductController::class,'getProduct']);
    Route::post('/{product}',[ProductController::class,'edit']);
    Route::post('/{product}/remove',[ProductController::class,'remove']);
});
