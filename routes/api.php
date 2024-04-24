<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;


/**
 * Auth API
 */
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register/customer', [AuthController::class, 'registerCustomer']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
