<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\API\Auth\LoginRequest;
use App\Http\Requests\API\Auth\GarageRegisterRequest;
use App\Http\Requests\API\Auth\CustomerRegisterRequest;
use App\Http\Requests\API\Auth\ForgotPasswordRequest;
use App\Http\Requests\API\Auth\RegistrationOtpRequest;
use App\Http\Requests\API\Auth\ResendOtpRequest;
use App\Http\Requests\API\Auth\UpdatePasswordRequest;
use App\Http\Requests\API\Auth\VerifyOtpRequest;
use Carbon\Carbon;
use Valorin\Random\Random;

class AuthController extends Controller
{
    /**
     * Login Customer / Garage / Employees / Suppliers
     * @param LoginRequest $request
     * @return JSON $response
     * @author Shani Singh
     */
    public function login(LoginRequest $request)
    {
        try {
            // Check User
            $user = User::where('email', $request->email)->first();
            
            // Check Password
            if(!$user || !Hash::check($request->password, $user->password))
            {
                return response()->json([
                    'status' => false,
                    'message' => 'The provided credentials are incorrect.',
                ], 401);
            }

            // Return Success Response with Token
            return response()->json([
                'status' => true,
                'message' => 'Logged IN Successfully!',
                'token' => $user->createToken($user->id)->plainTextToken,
                'user' => new UserResource($user)
            ],200);
            
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Register Customer
     * @param CustomerRegisterRequest $request
     * @return JSON $response
     * @author Shani Singh
     */
    public function registerCustomer(CustomerRegisterRequest $request)
    {
        try {
            //User Type Customer = 2, Role Customer = 3
            $user_type = 2;
            $role_id = 3;

            // Save Customer in DB
            $customer = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'mobile_number' => $request->mobile_number ?? null,
                'gst_number' => $request->gst_number ?? null,
                'user_type' => $user_type,
                'role_id' => $role_id,
            ]);

            // Return Success Response with Token
            return response()->json([
                'status' => true,
                'message' => 'Welcome! Your registration completed successfully!',
                'token' => $customer->createToken($customer->id)->plainTextToken,
                'user' => new UserResource($customer)
            ],200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }


    /**
     * Register Garage
     * @param GarageRegisterRequest $request
     * @return JSON $response
     * @author Shani Singh
     */
    public function registerGarage(GarageRegisterRequest $request)
    {
        try {
            //User Type Garage = 3, Role Garage = 4
            $user_type = 3;
            $role_id = 4;

            // Save Customer in DB
            $customer = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'business_name' => $request->business_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'mobile_number' => $request->mobile_number,
                'gst_number' => $request->gst_number ?? null,
                'user_type' => $user_type,
                'role_id' => $role_id,
                'otp' => Random::otp(6)
            ]);

            // Send OTP Notification To Customer

            // Return Success Response with Token
            return response()->json([
                'status' => true,
                'message' => 'Welcome! Your registration completed successfully!',
                'token' => $customer->createToken($customer->id)->plainTextToken,
                'user' => new UserResource($customer)
            ],200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Verify Registration OTP
     * @param RegistrationOtpRequest $request
     * @return JSON $response
     * @author Shani Singh
     */
    public function verifyOtpForRegistration(RegistrationOtpRequest $request)
    {
        try {
            $user = User::where('uuid', $request->uuid)->first();
            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => "Invalid Request",
                ], 500);
            }

            if ($user->otp !== $request->otp) {
                return response()->json([
                    'status' => false,
                    'message' => "Invalid Otp",
                ], 500);
            }

            // Update The Mobile Verified & OTP
            $user->update([
                'mobile_verified_at' => Carbon::now(),
                'otp' => null
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Account Verified successfully!'
            ],200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Resend OTP
     * @param ResendOtpRequest $request
     * @return JSON $response
     * @author Shani Singh
     */
    public function resendOtpForUser(ResendOtpRequest $request)
    {
        try {
            // TODO: Write Login For Resending OTP

            return response()->json([
                'status' => true,
                'message' => 'OTP Resend Successfully!!'
            ],200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Forgot Password
     * @param ForgotPasswordRequest $request
     * @return JSON $response
     * @author Shani Singh
     */
    public function forgotPassword(ForgotPasswordRequest $request)
    {
        try {
            // Generate OTP
            $user = User::where('email', $request->email)->first();
            $user->update([
                'otp' => Random::otp(6)
            ]);
            // TODO: SEND SMS For OTP

            return response()->json([
                'status' => true,
                'message' => 'OTP Resend Successfully!!',
                'uuid' => $user->uuid
            ],200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }


    /**
     * Verify OTP
     * @param VerifyOtpRequest $request
     * @return JSON $response
     * @author Shani Singh
     */
    public function verifyOtp(VerifyOtpRequest $request)
    {
        try {
            $user = User::where('uuid', $request->uuid)->first();
            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => "Invalid Request",
                ], 500);
            }

            if ($user->otp !== $request->otp) {
                return response()->json([
                    'status' => false,
                    'message' => "Invalid Otp",
                ], 500);
            }

            // Update The Mobile Verified & OTP
            $user->update([
                'otp' => null
            ]);

            return response()->json([
                'status' => true,
                'message' => 'OTP Verified successfully!'
            ],200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Update Password
     * @param UpdatePasswordRequest $request
     * @return JSON $response
     * @author Shani Singh
     */
    public function updatePassword(UpdatePasswordRequest $request)
    {
        try {
            $user = User::where('uuid', $request->uuid)->first();

            $user->update([
                'password' => Hash::make($request->password)
            ]);

            return response()->json([
                'status' => true,
                'message' => 'OTP Resend Successfully!!'
            ],200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }
}
