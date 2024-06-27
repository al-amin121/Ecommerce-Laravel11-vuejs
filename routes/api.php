<?php

use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\Fontend\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->User();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', HomeController::class);
});
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('dashboard', DashboardController::class);
    ;
});
