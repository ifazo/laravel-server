<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return response()->json([
        'success' => true,
        'message' => 'Server api is running successfully!',
    ]);
});

Route::post('/login', action: [AuthController::class, 'login']);

Route::get('/profile', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('products', ProductController::class);
    Route::apiResource('reviews', ReviewController::class);
    Route::apiResource('orders', OrderController::class);
});