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
        'message' => 'Laravel Server api is running successfully!',
    ]);
});

Route::post('/login', action: [AuthController::class, 'login']);

Route::get('/profile', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/reviews', [ReviewController::class, 'index']);
Route::get('/reviews/{id}', [ReviewController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('users', UserController::class)->except('index', 'show');
    Route::apiResource('categories', CategoryController::class)->except('index', 'show');
    Route::apiResource('products', ProductController::class)->except('index', 'show');
    Route::apiResource('reviews', ReviewController::class)->except('index', 'show');
    Route::apiResource('orders', OrderController::class);
});