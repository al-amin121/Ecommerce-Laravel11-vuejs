<?php


use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\PasswordResetController;
use App\Http\Controllers\Api\Auth\RegistrationController;
use App\Http\Controllers\Api\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;


Route::post('login',LoginController::class);
Route::post('register',RegistrationController::class);
Route::post('password/email', [PasswordResetController::class, 'sendResetEmail']);
Route::post('password/reset', [PasswordResetController::class, 'reset'])->middleware('signed')->name('password.reset');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout',LogoutController::class);
    Route::post('email/verify/send', [VerifyEmailController::class, 'sendMail']);
    Route::post('email/verify/{user}', [VerifyEmailController::class, 'verify'])->middleware('signed')->name('verify.email');

});
