<?php

use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\Fontend\HomeController;
use App\Http\Controllers\MainCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
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
});
Route::resource('MainCategory', MainCategoryController::class);
Route::resource('SubCategory', SubCategoryController::class);
Route::resource('Brand', BrandController::class);
Route::resource('Products', ProductController::class);
Route::get('/delete-image/{id}',[ProductController::class,'deleteImage']);

Route::get('/storage', function() {
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    dd('linked');
});
