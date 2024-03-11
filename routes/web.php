<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    echo "<h1>Welcome to the Laravel Server</h1>";
});

Route::get("/setup", function () {
    $credentials = [
        'email' => 'admin@mail.com',
        'password' => 'password',
    ];

    if (!Auth::attempt($credentials)) {
        $user = new \App\Models\User();

        $user->name = 'Admin';
        $user->email = $credentials['email'];
        $user->password = bcrypt($credentials['password']);

        $user->save();

        if (!Auth::attempt($credentials)) {
            $user = Auth::user();

            $adminToken = $user->createToken('admin-token', ['create', 'update', 'delete']);
            $updateToken = $user->createToken('update-token', ['create', 'update']);
            $userToken = $user->createToken('user-token');

            return [
                'admin' => $adminToken->plainTextToken,
                'update' => $updateToken->plainTextToken,
                'user' => $userToken->plainTextToken
            ];
        }
    }
});

Route::get("/api", function () {
    echo "<h1>Laravel API Server is running successfully!</h1>";
});
