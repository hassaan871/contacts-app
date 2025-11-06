<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthSession;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewUserController;
use App\Http\Controllers\GroupController;

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
Route::get('/logout', function() {
    session()->forget('user');
    return redirect('/login');
});

// Basic Auth Controllers 
Route::post('/signup', [AuthController::class, 'Signup']);
Route::post('/login', [AuthController::class, 'Login']);

// Routes that require Authentication 
Route::middleware([AuthSession::class])->group(function () {

    // Contacts view 
    Route::get('/contacts', [ContactController::class, 'contactsList']);

    // Contacts CRUD
    Route::post('/contacts', [ContactController::class, 'createNewContact']);
    Route::delete('/contacts/{id}', [ContactController::class, 'deleteContact']);

    // Showing the edit contact form 
    Route::get('/contacts/{id}', [ContactController::class, 'editContactForm']);
    Route::put('/contacts/{id}', [ContactController::class, 'editContact']);
    
    // Search bar
    Route::get('/search', [ContactController::class, 'search']);

    // New user feature
    Route::get('/users', [NewUserController::class, 'getGroupUsers']);
    Route::post('/users', [NewUserController::class, 'create']);

    Route::get('/groups', [GroupController::class, 'getGroups']);
});