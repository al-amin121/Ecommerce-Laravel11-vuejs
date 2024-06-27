<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LinkEmailRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Mail\ResetPasswordLink;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PasswordResetController extends Controller
{
    public function sendResetEmail(LinkEmailRequest $request){

        $url = \URL::temporarySignedRoute('password.reset', now()->addMinute(30), ['email' => $request->email]);

        //this is for convert bakend url to fontend url
        $url = str_replace(env('APP_URL'), env('FRONTEND_URL'), $url);

        Mail::to($request->email)->send(new ResetPasswordLink($url));

        return response()->json([
            'message' => 'Reset Password link sent your email'
        ]);
    }

    public function reset(ResetPasswordRequest $request){
         $user = User::whereEmail($request->email)->first();

         if (!$user){
             return response()->json([
                 'message' => 'User not found'
             ], 404);
         }

         $user->password = bcrypt($request->password);
         $user->save();

         return response()->json([
             'message' =>'Password reset successfuly'
         ],200);
    }

}
