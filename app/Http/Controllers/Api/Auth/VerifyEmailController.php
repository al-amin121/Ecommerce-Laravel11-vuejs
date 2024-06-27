<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Mail\EmailVerification;
use Illuminate\Http\Request;

class VerifyEmailController extends Controller
{
    public function sendMail(){
      \Mail::to(auth()->user())->send(new EmailVerification(auth()->user()));

      return response()->json([
          'massage' => 'Email verifiction link send on your email'
      ]);
    }


    public function verify(Request $request){

        if (!$request->user()->email_verified_at){
            $request->user()->forceFill([
                'email_verified_at' => now()
            ])->save();
        }

        return response()->json([
           'message' => 'Email varified'
        ]);
    }
}
