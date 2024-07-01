<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{


    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request)
    {

    
        $user = User::where('email',$request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)){

            return response()->json([
                'status' => 'failed',
                'message' => 'Warning: No match for Email address and/or Password.'
            ], 401);
        }

        

        $user->token = $user->createToken($request->email)->plainTextToken;
        $response = [
            'status' =>'success',
            'message' => 'user is logged in successfully',
            'data' => $user,
        ];
        return response()->json($response,200);
        

    }

    //     \Log::info('Login attempt:', ['email' => $request->email]);

    //     $user = User::where('email',$request->email)->first();
        
    //     if (!$user) {
    //         return response()->json([
    //             'status' => 'failed',
    //             'message' => 'User not found'
    //         ], 404);
    //     }
    //     if (!Hash::check($request->password, $user->password)) {
    //         return response()->json([
    //             'status' => 'failed',
    //             'message' => 'Incorrect password'
    //         ], 401);
    //     }
    //     // if (!$user || !Hash::check($request->password, $user->password)){
    //     //     return response()->json([
    //     //         'status' => 'failed',
    //     //        'message' => 'Incorrect !'
    //     //     ], 401);
    //     // }

    //     $user->token = $user->createToken($request->email)->plainTextToken;

    //     $response =[
    //         'status' => 'success',
    //         'message' => 'user is logged in successfully',
    //         'datd' => $user,
    //     ];
    //     return response()->json($response,200);
    // }
}
