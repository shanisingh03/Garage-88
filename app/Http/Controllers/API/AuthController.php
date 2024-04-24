<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\API\Auth\LoginRequest;
use App\Http\Requests\API\Auth\CustomerRegisterRequest;

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
}
