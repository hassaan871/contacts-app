<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Middleware\AuthSession;


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

// Contacts view 
Route::get('/contacts', [ContactController::class, 'contactsList'])->middleware(AuthSession::class);
// Contacts CRUD
Route::post('/contacts', [ContactController::class, 'createNewContact'])->middleware(AuthSession::class);
Route::delete('/contacts/{id}', [ContactController::class, 'deleteContact'])->middleware(AuthSession::class);
// Showing the edit contact form 
Route::get('/contacts/{id}', [ContactController::class, 'editContactForm'])->middleware(AuthSession::class);
Route::put('/contacts/{id}', [ContactController::class, 'editContact'])->middleware(AuthSession::class);

// Search bar
Route::get('/search', [ContactController::class, 'search']);