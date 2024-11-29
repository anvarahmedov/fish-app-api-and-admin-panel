<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\V1\DeviceController;
use App\Http\Controllers\V1\DeviceDataController;
use App\Http\Controllers\V1\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(
    ['prefix' => 'v1', 'middleware' => 'jwt.auth'], function() {
        Route::apiResource('users', UserController::class);
        Route::apiResource('devices', DeviceController::class);
        Route::apiResource('deviceDatas', DeviceDataController::class);

   });
