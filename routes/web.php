<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo "<h1>Welcome to the Laravel Server!</h1>";
});

Route::get('/api', function () {
    echo "<h1>Server api is running successfully!</h1>";
});

// Route::group((['prefix' => 'api']), function () {
//     Route::apiResource('users', UserController::class);
//     Route::apiResource('categories', CategoryController::class);
//     Route::apiResource('products', ProductController::class);
//     Route::apiResource('reviews', ReviewController::class);
//     Route::apiResource('orders', OrderController::class);
// });