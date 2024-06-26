<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;


/**
 * Auth API
 */
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register/customer', [AuthController::class, 'registerCustomer']);
Route::post('/register/garage', [AuthController::class, 'registerGarage']);

// Verify Mobile OTP
Route::post('/verify/registration-otp', [AuthController::class, 'verifyOtpForRegistration']);
Route::post('/register/resend-otp', [AuthController::class, 'resendOtpForUser']);

// Forgot Password
Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('/verify-otp', [AuthController::class, 'verifyOtp']);
Route::post('/update-password', [AuthController::class, 'updatePassword']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
