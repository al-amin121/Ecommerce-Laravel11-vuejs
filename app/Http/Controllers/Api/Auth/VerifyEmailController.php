<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Mail\EmailVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
class VerifyEmailController extends Controller
{
    public function sendMail(){

        $user = auth()->user();
        $verificationUrl = URL::signedRoute('verify.email', ['user' => $user->id]);
        Mail::to($user->email)->send(new EmailVerification($verificationUrl));

      return response()->json([
          'massage' => 'Email verifiction link send on your email'
      ]);
    }


    // public function verify(Request $request){

    //     if (!$request->user()->email_verified_at){
    //         $request->user()->forceFill([
    //             'email_verified_at' => now()
    //         ])->save();
    //     }

    //     return response()->json([
    //        'message' => 'Your account and Email successfully varified'
    //     ]);
    // }

    public function verify(Request $request)
    {
        if (!$request->hasValidSignature()) {
            Log::error('Invalid verification link or signature');
            return response()->json(['error' => 'Invalid verification link or signature'], 400);
        }

        if (!$request->user()->email_verified_at) {
            $request->user()->forceFill([
                'email_verified_at' => now()
            ])->save();
            Log::info('Email verified successfully for user: ' . $request->user()->email);
        }

        return redirect()->to('/login'); // Redirect to login page after successful verification
    }

    private function generateVerificationUrl($user)
    {
        $url = \URL::temporarySignedRoute('verify.email', now()->addMinutes(30), ['user' => $user->id]);

        Log::info('Generated verification URL: ' . $url);

        return $url;
    }
}
