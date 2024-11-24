<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo "<h1>Welcome to the Laravel Server!</h1>";
});

Route::get('/api', function () {
    echo "<h1>Server api is running successfully!</h1>";
});
