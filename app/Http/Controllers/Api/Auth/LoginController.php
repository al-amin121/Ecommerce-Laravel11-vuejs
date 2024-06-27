<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;


class LoginController extends Controller
{


    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user || \Hash::check($request->password, $user->password)){
            return response()->json([
               'message' => 'Incorrect !'
            ], 401);
        }

        $token = $user->createToken('access_token')->plainTextToken;
        return response()->json([
           'access_token' =>$token,
           'token_type' =>'Bearer'
        ], 200);
    }
}
