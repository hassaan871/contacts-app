<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('login');
});

// Basic Auth Views
Route::get('/signup', function () {
    return view('signup');
});
Route::get('/login', function () {
    return view('login');
});

// Basic Auth Controllers 
Route::post('/signup', [AuthController::class, 'Signup']);
Route::post('/login', [AuthController::class, 'Login']);
