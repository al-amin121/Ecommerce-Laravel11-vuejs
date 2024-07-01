<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Mail\EmailVerification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{

    /**
     * Handle the incoming request.
     */
    public function __invoke(RegistrationRequest $request)
    {
        
       $user = User::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => bcrypt($request->password),
       ]);

       $token = $user->createToken('auth_token')->plainTextToken;
       \Mail::to($user)->send(new EmailVerification($user));
      
       return response()->json([
            'message' => 'User registered successfully. Please verify your email !',
            'user' => $user,
           'access_token' => $token,
           'token_type' => 'Bearer'
       ], 201);
    }
}
